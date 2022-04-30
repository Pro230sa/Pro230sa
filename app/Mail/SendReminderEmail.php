<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendReminderEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $locker_number;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($locker_number)
    {
        $this->locker_number = $locker_number;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $locker_number = $this->locker_number;
        return $this->from(env('MAIL_FROM_ADDRESS'), 'RENINDER!!!')->markdown('mail.reminder_email', compact('locker_number'));
    }
}
