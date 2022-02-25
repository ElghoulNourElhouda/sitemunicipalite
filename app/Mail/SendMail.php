<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Mail;

class SendMail extends Mailable {
   use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $to_name = "consult test";
        $to_email = "temimi.muhamed@gmail.com";
        $data = array('name'=>"Ogbonna Vitalis(sender_name)", "body" => "A test mail");Mail::send('email.test', $data, function($message) use ($to_name, $to_email) {$message->to($to_email, $to_name)->subject('Laravel Test Mail');$message->from('temimi.muhamed@gmail.com','Test Mail');});
    }
}


