<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\File;
use Illuminate\Support\Facades\Input;

class OctaveController extends Controller
{
    public function index()
    {
       // $response = shell_exec("octave --no-gui --quiet ../../kyvadlo.txt {r}");      

        $command = Storage::get('octave/gulicka.txt');        

        $response = ltrim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));   

        return response($response,200);
    }

    public function get_ball_data(Request $request)
    {
        try {
           
        $query = ($request->query());

        $r = $query["r"];
        $startPosition = $query["startPosition"];
        $startSpeed = $query["startSpeed"];

        $command = $this->get_ball_script($r,$startPosition,$startSpeed);

        $response = ltrim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));

        $parsed = explode("ans= ",$response);

        $position = explode(" ",$parsed[1]);
        $alfa = explode(" ",$parsed[2]);

        $return = array(
            "position" => $position,
            "angle" => $alfa
        );

        return json_encode($return);
        } catch (\Throwable $th) {
         //   return response("Error",500);
        }


    }



    private function get_ball_script($r,$startPosition,$startSpeed)
    {
        return "
                m = 0.111;
                R = 0.015;
                g = -9.8;
                J = 9.99e-6;
                H = -m*g/(J/(R^2)+m);
                A = [0 1 0 0; 0 0 H 0; 0 0 0 1; 0 0 0 0];
                B = [0;0;0;1];
                C = [1 0 0 0];
                D = [0];   
                K = place(A,B,[-2+2i,-2-2i,-20,-80]);
                N = -inv(C*inv(A-B*K)*B);

                sys = ss(A-B*K,B,C,D);

                t = 0:0.01:5;
                r = ". $r . ";
                initPozicia= " . $startPosition . ";
                initRychlost= " . $startSpeed . ";
                [y,t,x]=lsim(N*sys,r*ones(size(t)),t,[initPozicia;0;initRychlost;0]);
                N*x(:,1)
                x(:,3)
                ";
    }
}
