<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Users;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginValidated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->session()->has('username'))
        {
            return redirect()->route('loginAdmin')->with('error', 'Kombinasi username dan password tidak valid.');
        }
        return $next($request);
    }
}
