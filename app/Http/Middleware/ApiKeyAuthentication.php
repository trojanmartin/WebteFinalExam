<?php

namespace App\Http\Middleware;

use Closure;

class ApiKeyAuthentication
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {       
        if($this->checkKey($request->apikey)){
           return $next($request);
        }
        else{          
            return response('Unauthorized.', 401);
        }        
    }

    private function checkKey($apiKey)
    {       
      
        if( $apiKey ===  config('auth.api_key')){           
            return true;
        }

        return false;
    }
}
