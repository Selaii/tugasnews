<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
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
        \Log::info('CheckAdmin middleware dipanggil.');

        if (!Auth::check() || !Auth::user()->is_admin) {
            \Log::info('User bukan admin atau tidak terautentikasi.');
            return redirect('/');
        }

        \Log::info('User adalah admin: ' . Auth::user()->id);
            
        return $next($request);
    }
}
