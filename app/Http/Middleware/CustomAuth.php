<?php

namespace App\Http\Middleware;

use Carbon\Carbon;
use Closure;
use Illuminate\Http\Request;

class CustomAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('nlogin')||session('nlogin')['expire']<Carbon::now() ) {
            alert()->error('مدت زمان قانونی اتصال به حساب شما به پایان رسید!','اخطار');
            return redirect(url('/'));
        }
        return $next($request);
    }
}
