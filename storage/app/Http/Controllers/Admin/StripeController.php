<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TempTransaction;
use Illuminate\Http\Request;
use App\Services\StripeService;
use Illuminate\Support\Facades\Log;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;

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
        return $request->all();
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
    
}
