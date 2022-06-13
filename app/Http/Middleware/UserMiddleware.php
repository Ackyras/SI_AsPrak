<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect()->intended(route('notfound'));
        }
        return $next($request);
    }
}
