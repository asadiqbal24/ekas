<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;


use Carbon\Carbon;
use App\Models\Appointment;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentReminder;

class UserEmailCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'useremail:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'user email for session';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tz = new \DateTimeZone('Asia/Karachi');
        $currentTime = Carbon::now($tz);
        $appointments = Appointment::with('user')->get();
    
        foreach ($appointments as $appointment) {
            // Convert the appointment date to a Carbon instance
            $appointmentDate = Carbon::parse($appointment->date)->setTimezone($tz);
    
            // Check if the appointment is within the next 24 hours
            if ($appointmentDate->between($currentTime, $currentTime->copy()->addHours(24))) {
                // Get the user associated with the appointment
                $user = $appointment->user;
    
                if ($user) {
                    // Prepare the email details
                    $details = [
                        "name" => $user->fname . " " . $user->lname,
                        "email" => $user->email,
                        "date" => $appointment->date,
                    ];
    
                    // Send the email
                    Mail::to($user->email)->send(new AppointmentReminder($details));
                }
            }
        }
    
        \Log::info("Cron Job Is Working Fine");
    }
}
