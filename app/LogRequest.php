<?php

namespace App;

use Illuminate\Http\Request;
use Log;
use Storage;


class LogRequest{

    public $message;
    public $state; 
    public $errorMessage;

    public function __construct($message, $state, $errorMessage=''){
        $this->message = $message;
        $this->state = $state;
        $this->errorMessage = $errorMessage;
    }

    public function save(){
        $messageToSave = "Príkaz: ".$this->message.", Stav:".$this->state.", Chyby:".$this->errorMessage;
        Log::channel('request')->info($messageToSave);
    }

    public function exportToCSV(){

        $content = Storage::disk('logs')->get('requests.log');

        Storage::put('Requests.csv', "\xEF\xBB\xBF".$content);
    }

}
