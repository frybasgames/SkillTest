<?php

namespace App\Http\Controllers;

use App\Mail\newMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendEmail(){
        $details = [
            'title' => 'Added.',
            'body' => 'Add new School.'
        ];

        Mail::to("frybasgames3@gmail.com")->send(new newMail($details));
        return "Email Sent";
    }
}
