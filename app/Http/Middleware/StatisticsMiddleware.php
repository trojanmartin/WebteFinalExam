<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;

class StatisticsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $param)
    {
        $this->updateDataToDb($param);
        return $next($request);
    }

    private function updateDataToDb($param){
        $affected = DB::table('statistics')
              ->increment($param);
    }
}
