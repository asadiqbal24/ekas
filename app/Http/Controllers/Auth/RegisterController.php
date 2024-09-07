<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeMail;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'email' => 'required|email|unique:users,email', // assuming 'users' is your table name
            'password' => 'required|min:8|confirmed',
            'fname' => 'required|string|max:255',
            'lname' => 'required|string|max:255',
            'dob' => 'required|date',
            'gender' => 'required|', // Add other genders if needed
            'academic' => 'required|string',
            'lookingfor' => 'required|',
            'lookingfor.*' => 'required|', // If you want each array element to be string and distinct
            'number' => 'required|digits_between:10,15', // Adjust according to your country's number format
            'address' => 'required|string|max:255',
            'postalcode' => 'required|string|max:20',
            'city' => 'required|string|max:255',
            'country' => 'required|string|max:255',
            'terms_agreed' => 'required|in:yes', // Make sure only 'yes' is considered as agreed
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    // {
    //    // $data['lookingfor'] = serialize([$data['lookingfor']]);
    //     $data['password'] = Hash::make($data['password']);
    //     unset($data['password_confirmation']);

    //     return User::create($data);


    // }

    protected function create(array $data)
    {
       
        $data['password'] = Hash::make($data['password']);
        $username = $data['fname'] . ' ' . $data['lname'];
        $email = $data['email'];

        unset($data['password_confirmation']);
        DB::beginTransaction();

        try {
           
            $user = User::create($data);

            $details = [
                'title' => 'Mail from Ekas',
                'body' => 'This is for Welcome email',
                'username' => $username
            ];

            Mail::to($email)->send(new WelcomeMail($details));

          
            DB::commit();

          
            return $user;
        } catch (\Exception $e) {
          
            DB::rollBack();

           
            Log::error('Error creating user or sending email: ' . $e->getMessage());

            throw $e;
        }
    }
}
