<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\SendMail;
use App\Statistics;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Input;

class MailController extends Controller
{
    public function sendEmail(Request $request){

        $this->validate($request,[
            'email' => 'required|email'
        ]);
        
        //From Database
        $stat = Statistics::all();
        
        $to_name = explode('@',$request->email);
        $name = $to_name[0];

        $data = array(
            'name' => $name,
            'stat' => $stat,
            'email' => $request->email
        );
        
        Mail::to($request->email)->send(new SendMail($data));
        return back()->with('success','Email has been sent successfully!');

    }
}
