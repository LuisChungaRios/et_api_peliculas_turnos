<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
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
        if ( auth()->check() &&  $request->user()->isAdmin()) {
            return $next($request);
        }
        return response()->json([
            'success' => 'fail',
            'message' => 'Don´t have access'
        ],403);
    }
}
