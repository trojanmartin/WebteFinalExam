<?php

use Illuminate\Support\Facades\Route;
use App\Statistics;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('locale/{locale}', function ($locale){
     Session::put('locale', $locale);
     return redirect()->back();
 });

Route::get('/', function(){
     $stat = Statistics::all();
     return view('statistic',['stat'=>$stat]);
});

Route::middleware(['statistics:model_A'])->group(function(){
     Route::get('ball',function(){
        return view('ball');
     });
});

Route::middleware(['statistics:model_B'])->group(function(){
     Route::get('plane',function(){
          return view('plane');
     });
});

Route::middleware(['statistics:model_C'])->group(function(){
     Route::get('suspension',function(){
          return view('suspension');
     });
});

Route::middleware(['statistics:model_D'])->group(function(){
     Route::get('cosi4',function(){
          echo "cosi4";
     });
});

Route::post('/sendemail','MailController@sendEmail');

Route::get("octave", function(){
     return view('octave');
});

