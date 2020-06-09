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

    public function execute_octave_command(Request $request)
    {
        $data = $request->json()->all();

       $command = $data["command"];

       $result = ltrim(shell_exec('octave --no-gui --quiet --eval "'. $command .'"'));

       $response = array(
           "result" => $result
       );

       return json_encode($response);
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

    public function get_suspension_data(Request $request){
        try {

            $query = ($request->query());

            $r = $query["r"];
            //$startCar = $query["startCar"];
            //$startWheel = $query["startWheel"];

            $command = $this->get_suspension_script($r,0,0);

            $response = trim(shell_exec('octave --no-gui --quiet --eval "pkg load control;'. $command .'"'));


            $parsed = explode("ans =",$response);

            $positionCar = explode('  ',$parsed[1]);
            $positionWheel = explode('  ',$parsed[2]);

            $positionCar = array_map('trim', $positionCar);
            $positionWheel = array_map('trim',$positionWheel);

            $return = array(
                "position_car" => $positionCar,
                "position_wheel" => $positionWheel
            );

            return json_encode($return);
            } catch (\Throwable $th) {
                //throw $th;
                return response("Error",500);
            }

    }

    public function get_suspension_script($r, $startX1, $startX2){
        return "m1 = 2500; m2 = 320;
        k1 = 80000; k2 = 500000;
        b1 = 350; b2 = 15020;
        A=[0 1 0 0;-(b1*b2)/(m1*m2) 0 ((b1/m1)*((b1/m1)+(b1/m2)+(b2/m2)))-(k1/m1) -(b1/m1);b2/m2 0 -((b1/m1)+(b1/m2)+(b2/m2)) 1;k2/m2 0 -((k1/m1)+(k1/m2)+(k2/m2)) 0];
        B=[0 0;1/m1 (b1*b2)/(m1*m2);0 -(b2/m2);(1/m1)+(1/m2) -(k2/m2)];
        C=[0 0 1 0]; D=[0 0];
        Aa = [[A,[0 0 0 0]'];[C, 0]];
        Ba = [B;[0 0]];
        Ca = [C,0]; Da = D;
        K = [0 2.3e6 5e8 0 8e6];
        sys = ss(Aa-Ba(:,1)*K,Ba,Ca,Da);

        t = 0:0.01:5;
        r =".$r.";
        initX1=0;
        initX1d=0;
        initX2=0;
        initX2d=0;
        [y,t,x]=lsim(sys*[0;1],r*ones(size(t)),t,[initX1;initX1d;initX2;initX2d;0]);
        x(:,1)
        x(:,3)
        ";
    }


}
