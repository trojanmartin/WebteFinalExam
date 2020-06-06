<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OctaveController extends Controller
{
    public function index()
    {
        $response = shell_exec("octave --no-gui --quiet ../../kyvadlo.txt {r}");

        return response($response,200);
    }
}
