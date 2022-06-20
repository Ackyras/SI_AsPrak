<?php

namespace App\Http\Middleware\Recruitment;

use App\Models\Period;
use Closure;
use Illuminate\Http\Request;

class RegistrationOpenMiddleware
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
        $period = Period::where('is_active', true)->get();
        if ($period->count() > 1 || $period) {
            return redirect()->back()->with(
                [
                    'warning'   =>  'Pendaftaran Asisten Praktikum periode ini belum dibuka'
                ]
            );
        }
        return $next($request);
    }
}
