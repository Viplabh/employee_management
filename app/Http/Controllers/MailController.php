<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;

class MailController extends Controller
{
    public function SendMail()

    {
        $data = ['name' => "raj", 'data' => "hello raj"];
        $user['to'] = 'rajviplabh@gmail.com';

        Mail::send('mail', $data, function ($message) use ($user) {
            $message->to($user['to']);
            $message->subject('hello');
        });
        return view("mail");
    }
}
