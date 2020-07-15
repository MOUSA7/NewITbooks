<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use RealRashid\SweetAlert\Facades\Alert;

class MailController extends Controller
{

    public function contact(){
        return view('email.contact');
    }

    public function send(Request $request){

        $roles = [
            'name' => 'required | max:16 |min:4',
            'email'=> 'required | email ',
            'mail_message'=> 'required |max:100'
        ];

       $this->validate($request,$roles);

       $data = [
           'name' => $request->name,
           'email'=> $request->email,
           'subject'=>$request->subject,
           'mail_message'=>$request->mail_message
       ];

       Mail::send('email.send',$data,function($message){
           $message->to('eng.mousa.sh@gmail.com','Mousa SH')->from('mousashawa-2012@hotmail.com','Mousa77')->subject('mail received from contact Page');
       });
        Alert::success('Send Message', 'Your Send Messages Blog Posts Successfully ! ');

        return redirect('/');
    }
    //
}
