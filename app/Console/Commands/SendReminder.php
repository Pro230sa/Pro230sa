<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\ReservationTime;
use Carbon\Carbon;
use Mail;
use App\Mail\SendReminderEmail;

class SendReminder extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends Reminder Email To Users';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $reservation_time = ReservationTime::latest()->first();

        if($reservation_time) {

            $time_flag = $reservation_time->end_date <= Carbon::now()->addDays(7)->toDateTimeString();

            if($time_flag) {

                $accepted_reservations = $reservation_time->reservations()->where(function($query) {
                    return $query->where('status', 'accepted');
                })->get();

                foreach ($accepted_reservations as $key => $accepted_reservation) {
                    $locker_number = $accepted_reservation->locker->locker_number;
                    $email = $accepted_reservation->user->email;

                    Mail::to($email)->send(new SendReminderEmail($locker_number));
                }
            }
        }
    }
}
