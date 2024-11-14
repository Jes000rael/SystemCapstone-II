<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDepartmentAccess
{
    public function handle($request, Closure $next, $role)
    {
        $user = Auth::user();

        if (!$user || 
        ($role === 'company' && $user->department_id !== 1) ||  
        ($role === 'hr' && $user->department_id !== 2) ||       
        ($role === 'employee' && ($user->department_id === 1 || $user->department_id === 2))) {  

        return redirect()->route('unauthorized')->with('error', "Access Denied. You must be a {$role}.");
    }

        return $next($request);
    }
}

