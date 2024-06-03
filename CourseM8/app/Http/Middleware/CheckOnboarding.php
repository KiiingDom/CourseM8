<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckOnboarding
{
    public function handle($request, Closure $next)
    {
        if (Auth::check() && !Auth::user()->onboarding_completed) {
            return redirect('/onboarding');
        }

        return $next($request);
    }
}
