<?php

namespace App\Http\Controllers\front\contact;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mail;

class indexController extends Controller
{
    public function index()
    {
        return view('front.contact.index');
    }

    public function contactSubmit(Request $request) {
        Mail::send('front.contact.index',[
            'name' => $request->name,
            'email' => $request->email,
            'subject' => $request->subject,
            'message' => $request->message,
        ],function ($mail) use ($request) {
            $mail->from(env('MAIL_FROM_ADDRESS'),$request->name);
            $mail->to('alihuseynli419@gmail.com')->subject('Contact us');
        });
        return 'Message send';
    }
}
