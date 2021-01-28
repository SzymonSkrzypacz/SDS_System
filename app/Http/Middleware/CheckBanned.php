<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Str;



class CheckBanned
{
    /**
     * Handle an incoming request.
     *
     * @param  Request  $request
     * @param Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->banned_until && now()->lessThan(auth()->user()->banned_until)) {
            $banned_days = now()->diffInDays(auth()->user()->banned_until);
            auth()->logout();

            if ($banned_days > 14) {
                $message = 'Twoje konto zostało zablokowane. Skontaktuj się z administratorem - admin@example.com';
            } else {
                $message = 'Twoje konto zostało zablokowane na ' . $banned_days . ' ' . Str::plural('dni',
                        $banned_days) . '. Skontaktuj się z administratorem - admin@example.com';
            }

            return redirect()->route('login')->with('error', $message);
        }

        return $next($request);
    }
}
