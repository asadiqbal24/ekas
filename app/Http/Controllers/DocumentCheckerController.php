<?php

// app/Http/Controllers/DocumentCheckerController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserDocumentChecker;
use Stripe;
use App\Services\StripeService;
use Illuminate\Support\Facades\Storage;
use DB;
use Session;
use Illuminate\Support\Facades\Log;

class DocumentCheckerController extends Controller
{
    protected $stripeService;
    public function __construct(StripeService $stripeService)
    {
        $this->stripeService = $stripeService;
    }
    public function index()
    {
        $customers = $this->stripeService->getCustomers();
        return response()->json($customers);
    }

    public function webhook(Request $request)
    {
        $payload = $request->getContent();
        $event = null;

        try {
            $event = \Stripe\Event::constructFrom(
                json_decode($payload, true)
            );
        } catch (\UnexpectedValueException $e) {
            return response()->json(['error' => 'Invalid payload'], 400);
        }

        switch ($event->type) {
            case 'checkout.session.completed':
                $this->handleCheckoutSessionCompleted($event->data->object);
                break;

            case 'charge.updated':
                $this->handleChargeUpdated($event->data->object);
                break;

            default:
                Log::info('Unhandled event type', ['type' => $event->type]);
        }
        return response()->json(['status' => 'success'], 200);
    }
    public function showForm()
    {
        return view('document-checker-form');
    }


    public function submitForm(Request $request)
    {

       // dd($request);
        try {
            // Set Stripe secret key and create a customer

            //$stripeSecretKey = env('STRIPE_SECRET');
    $stripeSecretKey ="sk_test_51PZx7wRqr2H0WfyWzyA7WXx75Z5z44aFwuaz44OApk8btzGrLJLridjJl7bKbBduqu0RAsgiicS03TW65ZaYNEIw00gwsHHbcv";


            if (empty($stripeSecretKey)) {
                throw new \Exception('Stripe API key not set.');
            }

            Stripe\Stripe::setApiKey($stripeSecretKey);
            //Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
            $customer = Stripe\Customer::create([
                "email" => $request->email,
                "name" => $request->first_name . " " . $request->last_name,
                "source" => $request->stripeToken
            ]);

            // Create a charge for the customer
            $amount = $request->amount * 100; // Convert to cents
            Stripe\Charge::create([
                "amount" => $amount,
                "currency" => "eur",
                "customer" => $customer->id,
            ]);

            // Validate file uploads
            // $request->validate([
            //     'visa_application_form' => 'nullable|mimes:pdf,doc,docx',
            //     'passport' => 'nullable|mimes:pdf,doc,docx',
            //     'masters_degree' => 'nullable|mimes:pdf,doc,docx',
            //     'masters_degree_transcript' => 'nullable|mimes:pdf,doc,docx',
            //     'bachelors_degree' => 'nullable|mimes:pdf,doc,docx',
            //     'bachelors_degree_transcript' => 'nullable|mimes:pdf,doc,docx',
            //     'metric_gcse_diploma' => 'nullable|mimes:pdf,doc,docx',
            //     'higher_secondary_a_level_diploma' => 'nullable|mimes:pdf,doc,docx',
            //     'english_language_test' => 'nullable|mimes:pdf,doc,docx',
            //     'recommendation_letter' => 'nullable|mimes:pdf,doc,docx',
            //     'letter_of_acceptance' => 'nullable|mimes:pdf,doc,docx',
            //     'proof_of_financial_support' => 'nullable|mimes:pdf,doc,docx',
            //     'hec_attestations_or_equivalency' => 'nullable|mimes:pdf,doc,docx',
            //     'any_other_document' => 'nullable|mimes:pdf,doc,docx',
            // ]);

            DB::beginTransaction();

            // Store document and form data
            $new = new UserDocumentChecker();
            $new->name = $request->name;
            $new->user_id = $request->user_id;
            $new->email = $request->email;
            $new->phone = $request->phone;

            // Document uploads
            $fields = [
                'updated_cv',
                'visa_application_form',
                'passport',
                'masters_degree',
                'masters_degree_transcript',
                'bachelors_degree',
                'bachelors_degree_transcript',
                'metric_gcse_diploma',
                'higher_secondary_a_level_diploma',
                'english_language_test',
                'recommendation_letter',
                'letter_of_acceptance',
                'proof_of_financial_support',
                'hec_attestations_or_equivalency',
                'any_other_document'
            ];

            foreach ($fields as $field) {
                if ($request->hasFile($field)) {
                    $new->$field = $this->storeFile($request->file($field), 'Customer/DocumentChecker/');
                }
            }

            // Save the rest of the form data
            $new->customer_message = $request->customer_message;
            $new->first_name = $request->first_name;
            $new->last_name = $request->last_name;
            $new->address = $request->address;
            $new->city = $request->city;
            $new->postcode = $request->postcode;
            $new->country = $request->country;
            $new->billing_email = $request->billing_email;
            $new->amount = $amount;
            $new->status = "Success";

            $new->save();


            DB::table('user_notification')->insert([
                'user_id' => auth()->user()->id,
                'title' => "New Document checker created successfully",
                'delete_at' => 0, 
                'created_at' => now(), 
                'updated_at' => now()
            ]);
            DB::commit();

            // Success message
            Session::flash('success', 'Payment and document upload successful!');
            return back()->with('success', 'Documents uploaded successfully!');
        } catch (\Stripe\Exception\CardException $e) {
            // Handle Stripe card error
            DB::rollBack();
            Session::flash('error', 'Card error: ' . $e->getMessage());
            return redirect()->back();
        } catch (\Exception $e) {
            // Handle other errors
            DB::rollBack();
            Session::flash('error', 'Something went wrong: ' . $e->getMessage());
            return redirect()->back();
        }
    }



    // private function storeFile($file, $directory)
    // {
    //     $filenameWithExt = $file->getClientOriginalName();
    //     $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
    //     $extension = $file->getClientOriginalExtension();
    //     $fileNameToStore = $filename . '-' . time() . '.' . $extension;
    //     $path = $file->storeAs('public/' . $directory, $fileNameToStore);
    //     return $fileNameToStore;
    // }
    
    protected function storeFile($file, $directory)
    {
        // Define the storage path
        $path = public_path($directory);
    
        // Get the original filename
        $originalName = $file->getClientOriginalName();
        
        // Generate a unique filename
        $filename = time() . '_' . pathinfo($originalName, PATHINFO_FILENAME) . '.' . $file->getClientOriginalExtension();
    
        // Move the uploaded file to the desired location
        $file->move($path, $filename);
    
        // Return just the filename
        return $filename;
    }
    
}
