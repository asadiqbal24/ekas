<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\AddCourse;
use App\Models\Todo;
use App\Models\User;
use App\Models\Wishlist;
use App\Models\Appointment;
use App\Models\AppointmentFiles;
use App\Models\AppointmentDate;
use App\Models\UserGuidanceCountryDocuments;
use Carbon\Carbon as CarbonCarbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\StreamedResponse;


use Stripe\Stripe;
use Stripe\Charge;
use Stripe\Customer;
use Session;



class UserController extends Controller
{
    public function getTodos()
    {
        $userId = auth()->id();
        $todos = Todo::where('user_id', $userId)->get();
        return response()->json(['todos' => $todos]);
    }
    public function dashboard()
    {
        if (auth()->check()) {
            $userId = auth()->id();
            $wishlistEntries = Wishlist::where('userID', $userId)->get();
            // $user_notification = DB::table('user_notification')
            //     ->leftJoin('notification', 'user_notification.notification_id', '=', 'notification.id')
            //     ->where(function ($query) {
            //         $query->whereNull('user_id')
            //             ->orWhere('user_id', '=', '');
            //     })
            //     ->where('user_notification.delete_at', '=', 0)
            //     ->select('user_notification.*', 'notification.description')
            //     ->get();

            $user_notification = DB::table('user_notification')
                ->leftJoin('notification', 'user_notification.notification_id', '=', 'notification.id')
                ->where(function ($query) use ($userId) {
                    $query->whereNull('user_id')
                        ->orWhere('user_id', $userId);
                })
                ->where('user_notification.delete_at', '=', 0)
                ->select('user_notification.*', 'notification.description')
                ->get();



            //dd($user_notification);

            $appointments = Appointment::where('user_id', $userId)->with('appointment_session_dates')->get();
           // dd($appointments);
            $appointmentsfiles = AppointmentFiles::where('user_id', $userId)->get();
            $wishlistCourseIds = $wishlistEntries->pluck('courseId')->toArray();
            $courses = AddCourse::whereIn('id', $wishlistCourseIds)->get();
            $soon = Carbon::now()->addDays(3);
            $courses->each(function ($course) use ($soon) {
                $course->inWishlist = true;
                $course->expiringSoon = $course->ApplicationDeadline >= Carbon::now() && $course->ApplicationDeadline <= $soon;
            });
            $todos = Todo::where('user_id', $userId)->get();
        }
        return view('user.dashboard', compact('courses', 'todos', 'appointments', 'appointmentsfiles', 'user_notification'));
    }

    public function user_notification_delete($id)
    {
        $userId = auth()->id();
        DB::table('user_notification')
            ->where('id', $id)
            ->update([
                'delete_at' => is_numeric(1) ? 1 : null,
                'user_id' => $userId
            ]);


        return redirect()->back()->with('success', 'Notification deleted successfully');
    }
    public function profile()
    {
        return view('user.profile');
    }
    public function updateInfo(Request $request)
    {
        $user = User::find(Auth::id());
        $data = $request->all();

        if (!empty($data['old_password'])) {
            if (Hash::check($data['old_password'], $user->password)) {
                if (!empty($data['password']) && !empty($data['password_confirmation'])) {
                    if ($data['password'] === $data['password_confirmation']) {
                        $user->password = Hash::make($data['password']);
                        $user->save();
                        return redirect()->back()->with('success', 'Password updated successfully.');
                    } else {
                        return redirect()->back()->with('error', 'New passwords do not match.');
                    }
                } else {
                    return redirect()->back()->with('error', 'New password and confirmation are required.');
                }
            } else {
                return redirect()->back()->with('error', 'Your current password does not match the password you provided. Please try again.');
            }
        } else {
            unset($data['password'], $data['password_confirmation'], $data['old_password']);
            $user->update($data);
            return redirect()->back()->with('success', 'Profile updated successfully.');
        }
    }

    public function addToList(Request $request)
    {
        $request->validate([
            'task_description' => 'required',
        ]);
        $data = $request->all();
        $data['user_id'] = Auth::id();
        Todo::create($data);
        return response()->json(['message' => 'To do list added successfully.']);
    }
    public function deleteToList($id)
    {
        Todo::where('id', $id)->where('user_id', Auth::id())->first()->delete();
        return response()->json(['success' => true]);
    }
    public function subscribe(Request $request)
    {
        $request->validate(['email' => 'required']);
        DB::table('subscribe')->insert(['email' => $request->email]);
        return redirect()->back()->with('success', 'Subscribed successfully.');
    }

    public function processPayment(Request $request)
    {
        if (auth()->check()) {


            $request->validate([
                'stripeToken' => 'required',
                // 'name' => 'required',
                'email' => 'required',
                'guidance_country' => 'required',

            ]);

            Stripe::setApiKey(env('STRIPE_SECRET'));
            $type = $request->input('type');

            try {
                if ($type == 'ekas') {

                    $customer = Customer::create([
                        "email" => $request->input('email'),
                        "name" => $request->first_name . " " . $request->last_name,
                        "source" => $request->stripeToken
                    ]);

                    $charge = Charge::create([
                        "amount" => 100,
                        "currency" => "eur",
                        'description' => 'EKAS Guidance Document Payment',
                        "customer" => $customer->id,
                    ]);
                }


                DB::table('user_guidance_country_document')->insert([
                    // 'name' => $request->input('name'),
                    'email' => $request->input('email'),
                    'guidance_country' => $request->input('guidance_country'),
                    'user_id' => auth()->user()->id,
                    'created_at' => Carbon::now()
                ]);

                return response()->json(['success' => true, 'message' => 'Payment successful!']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Payment failed! ' . $e->getMessage()], 500);
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Not authenticated! ' . $e->getMessage()], 500);
        }
    }


    public function process_payment_ekas_guide_documents(Request $request){
      

        if (auth()->check()) {

            $request->validate([
                'stripeToken' => 'required',

            ]);
            try {                
            Stripe::setApiKey(env('STRIPE_SECRET'));
            $documents = UserGuidanceCountryDocuments::orderBy('id','DESC')->first();
            $documents->payment_status = "Paid";
            $documents->type = "ekas";
            $documents->status = "Active";
            $documents->save();
            $customer = Customer::create([
                "email" => $documents->email,
                "name" => $request->first_name . " " . $request->last_name,
                "source" => $request->stripeToken
            ]);
            $charge = Charge::create([
                "amount" => 100,
                "currency" => "eur",
                'description' => 'EKAS Guidance Document Payment',
                "customer" => $customer->id,
            ]);
              // Insert notification
        DB::table('user_notification')->insert([
            'user_id' => auth()->user()->id,
            'title' => "Ekas guidance document created successfully",
            'delete_at' => 0,
            'created_at' => now(),
            'updated_at' => now()
        ]);

            Session::flash('success', 'Payment successful!');

            return redirect()->route('ekas-guidance',['success' => 'ekas', 'message' => 'Payment successful! ']);
           // return response()->json(['success' => true, 'message' => 'Payment successful!']);
                
            }catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Payment failed! ' . $e->getMessage()], 500);
            }


        

            
        }

    }

    public function ekas_guidance(){
        $userDocPayment = DB::table('user_guidance_country_document')->where('user_id',auth()->user()->id)->first();
        $payment_status = "false";
        if($userDocPayment){
            $payment_status = "true";
        }
        return view('ekas_guidance',compact('payment_status'));
    }

    public function downloadGuidancePDF(Request $request, $country, $type)
    {

        if (auth()->check()) {

            $userDocPayment = DB::table('user_guidance_country_document')->where('user_id', auth()->user()->id)->where('guidance_country', $country)->first();

            if ($userDocPayment) {
                $filePath = storage_path('app/pdfs/' . $type . '/' . $country . '.pdf');
                // dd($filePath);

                // Check if file exists (optional)
                if (!file_exists($filePath)) {
                    return abort(404); // Shortcut for non-existent file
                }

                // Download the file directly

                $fileName = ucfirst($country) . " " . ucfirst($type) . " Guide.pdf";
                $headers = [
                    'Content-Type' => 'application/pdf',
                    'Content-Disposition' => 'inline; filename="' . $fileName . '"'
                ];

                return  response()->make(file_get_contents($filePath), 200, $headers);
            }
        }
    }




    public function downloadFile($id)
    {
        // Find the file record in the database
        $fileRecord = AppointmentFiles::find($id);

        if (!$fileRecord || !$fileRecord->file) {
            return redirect()->back()->with('error', 'File not found.');
        }


        $filePath = 'http://localhost/ekasadminpanel/storage/app/public/Customer/SessionReport/' . $fileRecord->file;
        // $filePath = 'https://test.ekas.be/storage/app/public/Customer/SessionReport/' . $fileRecord->file;


        return redirect($filePath);
    }


    


    public function checkAvailability(Request $request)
    {
        $date1 = $request->input('date1');
        $time1 = $request->input('time1');
        $date2 = $request->input('date2');
        $time2 = $request->input('time2');
    
        // Check availability for date1 and time1 first
        $isDate1Booked = AppointmentDate::where('date', $date1)
                                    ->where('time', $time1)
                                    ->exists();
    
        if ($isDate1Booked) {
            // If date1 and time1 are booked, return immediately
            return response()->json(['booked' => ['date1' => true, 'date2' => false]]);
        }
    
        // If date1 and time1 are available, check date2 and time2
        $isDate2Booked = AppointmentDate::where('date', $date2)
                                    ->where('time', $time2)
                                    ->exists();
    
        return response()->json(['booked' => ['date1' => false, 'date2' => $isDate2Booked]]);
    }
    



    public function checkAvailabilityFirst(Request $request)
    {
        $date1 = $request->input('date1');
        $time1 = $request->input('time1');

        // Check if the date and time are booked
        $exists = AppointmentDate::where('date', $date1)
            ->where('time', $time1)
            ->exists();

        return response()->json(['booked' => $exists]);
    }


    public function checkAvailabilityLast(Request $request)
    {
        $date = $request->input('date');
        $time = $request->input('time');
    
        // Check if the date and time are booked
        $isBooked = AppointmentDate::where('date', $date)->where('time', $time)->exists();
    
        return response()->json(['booked' => $isBooked]);
    }



    public function submit_form_austria_guidance_visa(Request $request) {
        // Validate incoming request data


        $visaForm = new UserGuidanceCountryDocuments();
        $visaForm->name = $request['name'];
        $visaForm->email = $request['email'];
        $visaForm->type = $request->input('type');
        $visaForm->guidance_country = $request->input('guidance_country'); 
        $visaForm->user_id = auth()->user()->id;
        $visaForm->payment_status = "free";
        $visaForm->status = "Active";
        
        $visaForm->save();
        return response()->json(['success' => true, 'message' => 'Form submitted successfully!']);
    }
    
}



// CREATE TABLE `ekas`.`user_guidance_country_document` (`name` TEXT NULL DEFAULT NULL , `email` TEXT NULL DEFAULT NULL , `guidance_country` TEXT NULL DEFAULT NULL , `user_id` INT NULL DEFAULT NULL , `payment_status` INT NULL DEFAULT '1' , `created_at` TIMESTAMP NULL DEFAULT CURRENT_TIMESTAMP , `id` INT NOT NULL AUTO_INCREMENT , PRIMARY KEY (`id`))