<?php

namespace App\Http\Middleware\Recruitment;

use Closure;
use Illuminate\Http\Request;

class ExamMiddleware
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
        $registrar = auth()->user()->registrar;
        $registrar->load(
            [
                'period_subjects'   =>  function ($query) use ($period_subject) {
                    $query->where('is_pass_file_selection', true)->where('is_take_exam_selection', false)->where('period_subject.id', $period_subject->id);
                }
            ]
        );
        // dd($registrar);
        if (!$registrar->period_subjects) {
            return back()->with(
                [
                    'alert' =>  [
                        'status'    =>  'failed',
                        'msg'   =>  'Anda tidak dapat mengikuti ujian ini jika anda tidak lulus seleksi berkas atau sudah melakukan submit ujian'
                    ]
                ]
            );
        }
        return $next($request);
    }
}
