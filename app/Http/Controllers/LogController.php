<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Log;
use Storage;

class LogController extends Controller
{
    public function export(){
        $content = Storage::disk('logs')->get('requests.log');

        Storage::put('Requests.csv', "\xEF\xBB\xBF".$content);
        return Storage::download('Requests.csv');
    }
}
