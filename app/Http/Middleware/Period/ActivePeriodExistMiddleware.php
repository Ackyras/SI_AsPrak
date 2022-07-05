<?php

namespace App\Http\Middleware\Period;

use App\Models\Period;
use Closure;
use Illuminate\Http\Request;

class ActivePeriodExistMiddleware
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
        $period = Period::where('is_active', true)->count();
        if ($period > 0) {
            return $next($request);
        }
        return to_route('admin.dashboard')->with([
            'failed'    =>  'Tidak ada periode aktif saat ini',
        ]);
    }
}
