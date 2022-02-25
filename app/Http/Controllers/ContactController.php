<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Http\Requests;
use App\Http\Requests\ContactRequest;
class ContactController extends Controller
{
    public function index()

    {

        return view('contact');

    }


    public function contact(ContactRequest $request)

    {
        $email = $request->input('email');

        Mail::send('email/email_contact', $request->all(), function($message) 

        {

            $message->to('i.consulting.nfo@gmail.com')->subject('Contact');

        });

 // Mail::send('email.test', ['name' => 'med'], function($message){
 //        $message->to('temimi.muhamed@gmail.com', 'test mail')->from('test@mail.com')->subject('test envoi email via laravel');

    // });

         return back()->with('success', 'Email envoyé avec succé!');

    }
}
