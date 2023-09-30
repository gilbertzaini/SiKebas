<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class superuserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if ($request->user()->jabatan == "Pengurus") {
            abort(403, 'Unauthorized');
        }

        return $next($request);
    }
}