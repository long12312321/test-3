<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\RegisterRequest;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class RegisterController extends Controller
{
    public function registerAccount(RegisterRequest $request){
        $user = new User();
        $user->email =  $request->input("email");
        $user->password = bcrypt($request->input("cofirm"));
        $user->name = $request->input("name");
        $user->save();
        $details =[
            'email'=>  $request->input("email"),
            'pass'=>   $request->input("pass") ,
            'name'=>  $request->input("name")
    ];
    Mail::send('content_email',$details,function($message) use($request){
        $message->from ('haibatcom1@gmail.com','Leo2k');
        $message->to ($request->email,$request->name);
        $message->subject('Mail cofirm account');
    });

    }
}
