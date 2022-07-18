<?php

namespace App\Http\Middleware\Recruitment;

use Closure;
use Illuminate\Http\Request;

class OpenForRegistrationMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $period = $request->route()->parameter('period');
        if ($period->is_open_for_selection) {
            return $next($request);
        }
        return back()->with(
            [
                'failed'    =>  'Pendaftaran belum dibuka atau sudah ditutup'
            ]
        );
    }
}
