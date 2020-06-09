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

        $response = trim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));


        $parsed = explode("ans =",$response);		

        $position = explode('  ',$parsed[1]);
        $alfa = explode('  ',$parsed[2]);

	$position = array_map('trim', $position);
	$alfa = array_map('trim',$alfa);
       
        $return = array(
            "position" => $position,
            "angle" => $alfa
        );

        return json_encode($return);
        } catch (\Throwable $th) {
//throw $th;         
  	 return response("Error",500);
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

    private function get_invertedPendulum_script($r)
    {
        return "
        M = .5;
        m = 0.2;
        b = 0.1;
        I = 0.006;
        g = 9.8;
        l = 0.3;
        p = I*(M+m)+M*m*l^2;
        A = [0 1 0 0; 0 -(I+m*l^2)*b/p (m^2*g*l^2)/p 0; 0 0 0 1; 0 -(m*l*b)/p m*g*l*(M+m)/p 0];
        B = [ 0; (I+m*l^2)/p; 0; m*l/p];
        C = [1 0 0 0; 0 0 1 0];
        D = [0; 0];
        K = lqr(A,B,C'*C,1);
        Ac = [(A-B*K)];
        N = -inv(C(1,:)*inv(A-B*K)*B);
        
        sys = ss(Ac,B*N,C,D);
        
        t = 0:0.05:10;
        r =". $r . ";
        initPozicia=0;
        initUhol=0;
        [y,t,x]=lsim(sys,r*ones(size(t)),t,[initPozicia;0;initUhol;0]);
        plot(t,y)
        
        r=0.5; 
        [y,t,x]=lsim(sys,r*ones(size(t)),t,x(size(x,1),:));
        x(:,1)
        x(:,3)";
    }

    public function get_invertedPendulum_data(Request $request)
    {
        try {
           
        $query = ($request->query());

        $r = $query["r"];
        //$startPosition = $query["startPosition"];
        //$startSpeed = $query["startSpeed"];

        $command = $this->get_invertedPendulum_script($r);

        $response = trim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));


        $parsed = explode("ans =",$response);		

        $position = explode('  ',$parsed[1]);
        $alfa = explode('  ',$parsed[2]);

	    $position = array_map('trim', $position);
	    $alfa = array_map('trim',$alfa);
       
        $return = array(
            "position" => $position,
            "angle" => $alfa
        );

        return json_encode($return);
        } catch (\Throwable $th) {
            //throw $th;         
            return response("Error",500);
        }
    }
}
