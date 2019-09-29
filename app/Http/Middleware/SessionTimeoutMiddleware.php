<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Support\Facades\Auth;

class SessionTimeoutMiddleware
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
        if($request->path() != 'logout' && Auth::check())
        {
            $startAuth = Auth::User()->authorized_at;
            if(empty($startAuth))
            {
                return redirect('logout');
            }

            $nowTime = strtotime(Carbon::now());
            $startAuthTime = strtotime($startAuth);

            $checkTime = $nowTime - $startAuthTime;

            $timeLimit = 3*60;

            if($checkTime > $timeLimit)
            {
                return redirect('logout');
            }
        }

        return $next($request);
    }
}
