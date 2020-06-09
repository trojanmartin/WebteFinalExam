<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LogRequest;


class TestController extends Controller
{
    public function index(){
        return view('logTest');
    }


    public function create(Request $request){

        $logRequest = new LogRequest($request->info, "OK");
        $logRequest->save();
        $logRequest->exportToCSV();

        return redirect('/');
    }

}
