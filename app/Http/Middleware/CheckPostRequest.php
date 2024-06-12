<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPostRequest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->method() !== 'POST') {
            // Jika bukan permintaan POST, redirect ke rute lain atau berikan respons sesuai kebutuhan
            return redirect()->route('form_data_personal_create_code');
        }

        return $next($request);
    }
}
