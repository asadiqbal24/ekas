<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempTransaction;
use Illuminate\Http\Request;
use App\Services\StripeService;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Stripe;
use Session;
use App\Models\Appointment;
use App\Models\AppointmentDate;
use App\Mail\InvoiceUser;
use Illuminate\Support\Facades\Mail;
use DB;


class StripeController extends Controller
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

    public function handleCheckoutSessionCompleted($session)
    {
        $tempTrans = TempTransaction::where('email' , '=' , $session->customer_details->email)->first();
        $transaction = new Transaction([
            'payment_intent' => $session->payment_intent,
            'amount' => $session->amount_total / 100,
            'currency' => $session->currency,
            'status' => $session->payment_status,
            'service' => $tempTrans->service,
            'selected_date' => $tempTrans->selected_date,
            'guidance_package' => $tempTrans->guidance_package,
            'phone' => $tempTrans->phone,
        ]);
        if (isset($session->customer_details)) {
            $transaction->email = $session->customer_details->email ?? null;
            $transaction->name = $session->customer_details->name ?? null;
        }
        $transaction->save();
        $tempTrans->delete();
    }

    protected function handleChargeUpdated($charge)
    {
        $transaction = Transaction::where('payment_intent', $charge->payment_intent)->first();

        if ($transaction) {
            // Update transaction with receipt URL and other details if needed
            $transaction->receipt_url = $charge->receipt_url;
            $transaction->save();

            Log::info('Transaction updated with receipt URL', ['id' => $transaction->id]);
        } else {
            Log::warning('Transaction not found for updated charge', ['payment_intent' => $charge->payment_intent]);
        }
    }

    // 
    public function getPaymentDetails()
    {
        $details = Transaction::all();
        return view('admin.payments.index', compact('details'));
    }
    public function delete($id)
    {
        $details = Transaction::findOrFail($id);
        return redirect()->back()->with('message', 'Record deleted successfully.');
    }
    public function getUserData(Request $request)
    {
        $request->validate([
            'service' => 'required',
            'guidance_package' => 'required',
            'selected_date' => 'required',
        ]);
        TempTransaction::create($request->all());
        $selectedOption = $request->input('guidance_package');

        if ($selectedOption === 'single session') {
            return 'sessionone';
        } else if ($selectedOption === 'Bundle One') {
            return 'bundleone';
        } else if ($selectedOption === 'Bundle Two') {
            return 'bundletwo';
        } else {
            // Handle unexpected option
            return response('Unexpected option', 400);
        }
        
    }


//       public function StripePost(Request $request)
// {
//     try {

       
//        $email= $request->email;
//     //    $amount= 100 * 100;

//         $result = $request->package;
//         $result_explode = explode('|', $result);
//         $package = $result_explode[0];
//         $amount = $result_explode[1];

//         Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
//         $customer = Stripe\Customer::create([
//             "email" => $email,
//             "name" => $request->first_name." ".$request->last_name,
//             "source" => $request->stripeToken
//         ]);
//         $charge = Stripe\Charge::create([
//             "amount" =>$amount*100 ,
//             "currency" => "eur",
//             "customer" => $customer->id,
//         ]);

        

     

       


      

//         Appointment::create([
//             'service_type' => $request->service,
//             'package' => $package,
//             'date' => $request->date,
//             'time' => $request->time,
//             'phone_no' => $request->phone_no,
//             'email' => $email,
//             'payment_mode' => $request->payment_mode,
//             'amount' => $amount,
//             'status' => 'Success',
//             'user_id' => auth()->user()->id
//         ]);
//         $randomNumber = rand(10000000, 99999999);
//         $details = [
//             "name" => $request->first_name." ".$request->last_name,
//             "email" => $email,
//             "service_type" => $request->service,
//             "package" => $request->package,
//             "amount" => $amount,
//             "address" => $request->address,
//             "phone_no" => $request->phone_no,
//             "country" => $request->country,
//             "invoicenumber" => $randomNumber,
//         ];


//         DB::table('user_notification')->insert([
//             'user_id' => auth()->user()->id,
//             'title' => "Appoitment created successfully . Check your email for invoice",
//             'delete_at' => 0, 
//             'created_at' => now(), 
//             'updated_at' => now()
//         ]);
       
      
//         Mail::to($email)->send(new InvoiceUser($details));

      
//         // Flash success message
//         Session::flash('success', 'Payment successful!');

//         // Redirect back or to a specific route
//         return redirect()->back();
//     } catch (Stripe\Exception\CardException $e) {
//         // Handle card errors
//         Session::flash('error', 'Card error: ' . $e->getMessage());
//         return redirect()->back();
//     } catch (Exception $e) {
//         // Handle other errors
//         Session::flash('error', 'Payment failed: ' . $e->getMessage());
//         return redirect()->back();
//     }
// }



public function StripePost(Request $request)
{
    try {
        // Retrieve email and package details
        $email = $request->email;
        $result = $request->package;
        $result_explode = explode('|', $result);
        $package = $result_explode[0];
        $amount = $result_explode[1];

        // Set Stripe API key
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));

        // Create a new customer in Stripe
        $customer = Stripe\Customer::create([
            "email" => $email,
            "name" => $request->first_name . " " . $request->last_name,
            "source" => $request->stripeToken
        ]);

        // Create a charge in Stripe
        $charge = Stripe\Charge::create([
            "amount" => $amount * 100,
            "currency" => "eur",
            "customer" => $customer->id,
        ]);

        // Initialize appointment data array
        $appointmentData = [];

        // Populate appointment data based on package type
        if ($package === 'single') {
            $appointmentData = [
                [
                    'date' => $request->input('appoitment_date'),
                    'time' => $request->input('time'),
                ],
            ];
        } elseif ($package === 'bundle1') {
            $appointmentData = [
                ['date' => $request->input('appoitment_1'), 'time' => $request->input('appoitment_time1')],
                ['date' => $request->input('appoitment_2'), 'time' => $request->input('appoitment_time2')],
            ];
        } elseif ($package === 'bundle2') {
            $appointmentData = [
                ['date' => $request->input('bundle2_appoitment_1'), 'time' => $request->input('bundle2_appoitment_time1')],
                ['date' => $request->input('bundle2_appoitment_2'), 'time' => $request->input('bundle2_appoitment_time2')],
                ['date' => $request->input('bundle2_appoitment_3'), 'time' => $request->input('bundle2_appoitment_time3')],
                ['date' => $request->input('bundle2_appoitment_4'), 'time' => $request->input('bundle2_appoitment_time4')],
            ];
        }

        // Create the appointment record
        $appointment = Appointment::create([
            'service_type' => $request->service,
            'package' => $package,
            'phone_no' => $request->phone_no,
            'email' => $email,
            'payment_mode' => $request->payment_mode,
            'amount' => $amount,
            'status' => 'Success',
            'user_id' => auth()->user()->id
        ]);

        // Insert appointment dates
        foreach ($appointmentData as $data) {
            AppointmentDate::create([
                'appointment_id' => $appointment->id,
                'date' => $data['date'],
                'time' => $data['time'],
            ]);
        }

        // Prepare invoice details
        $randomNumber = rand(10000000, 99999999);
        $details = [
            "name" => $request->first_name . " " . $request->last_name,
            "email" => $email,
            "service_type" => $request->service,
            "package" => $request->package,
            "amount" => $amount,
            "address" => $request->address,
            "phone_no" => $request->phone_no,
            "country" => $request->country,
            "invoicenumber" => $randomNumber,
        ];

        // Insert notification
        DB::table('user_notification')->insert([
            'user_id' => auth()->user()->id,
            'title' => "Appointment created successfully. Check your email for invoice",
            'delete_at' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

        // Send invoice email
        Mail::to($email)->send(new InvoiceUser($details));

        // Flash success message and redirect
        Session::flash('success', 'Payment successful!');
        return redirect()->back();
    } catch (Stripe\Exception\CardException $e) {
        // Handle card errors
        Session::flash('error', 'Card error: ' . $e->getMessage());
        return redirect()->back();
    } catch (Exception $e) {
        // Handle other errors
        Session::flash('error', 'Payment failed: ' . $e->getMessage());
        return redirect()->back();
    }
}

    
}
