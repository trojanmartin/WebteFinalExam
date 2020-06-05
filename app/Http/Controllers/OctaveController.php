<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Storage;

class OctaveController extends Controller
{
    public function index()
    {
       // $response = shell_exec("octave --no-gui --quiet ../../kyvadlo.txt {r}");      

        $command = Storage::get('octave/gulicka.txt');        

        $response = ltrim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));   

        return response($response,200);
    }
}
