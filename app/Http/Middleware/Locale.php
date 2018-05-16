<?php

namespace App\Http\Middleware;

use Closure;
use App;
use Config;  
use Session;
use Cache;

class Locale  
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
        session_start();
        if(isset($_SESSION['locale']))
            App::setLocale($_SESSION['locale']);
        session_write_close();

        return $next($request);
    }
}
