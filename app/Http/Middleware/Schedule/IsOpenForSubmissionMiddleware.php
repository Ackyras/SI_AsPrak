<?php

namespace App\Http\Middleware\Schedule;

use Closure;
use App\Models\Period;
use Illuminate\Http\Request;

class IsOpenForSubmissionMiddleware
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
        $period = Period::firstWhere('is_active', true);
        if (!$period->is_open_for_schedule_submission) {
            return to_route('user.dashboard')->with(
                'alert',
                [
                    'status'    =>  'failed',
                    'msg'       =>  'Pengajuan jadwal sudah ditutup'
                ]
            );
        }
        return $next($request);
    }
}
