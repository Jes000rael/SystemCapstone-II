<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Config;

class SetUserTimezone
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            $timezone = $user->company->timezone ?? 'UTC';
        
            // Log the timezone for debugging
            \Log::info('Company Timezone:', ['timezone' => $timezone]);
        
            Config::set('app.timezone', $timezone);
            date_default_timezone_set($timezone);
        }
        
        return $next($request);
    }
}
