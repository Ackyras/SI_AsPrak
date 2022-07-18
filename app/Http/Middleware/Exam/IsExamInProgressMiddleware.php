<?php

namespace App\Http\Middleware\Exam;

use Closure;
use Illuminate\Http\Request;

class IsExamInProgressMiddleware
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
        $period_subject = $request->route()->parameter('period_subject');
        if (now() < $period_subject->exam_start) {
            return to_route('user.exam.index')->with(
                [
                    'alert'  =>  [
                        'status'    =>  'failed',
                        'msg'       =>  'Ujian belum dimulai, harap perhatikan jadwal ujian',
                    ]
                ]
            );
        }
        // dd($request->all());
        if (now() > $period_subject->exam_end) {
            return to_route('user.exam.index')->with(
                [
                    'alert'  =>  [
                        'status'    =>  'failed',
                        'msg'       =>  'Ujian sudah selesai, harap perhatikan jadwal ujian',
                    ]
                ]
            );
        }
        return $next($request);
    }
}
