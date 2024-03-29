<?php

namespace App\Http\Middleware\News;

use Closure;
use Illuminate\Http\Request;

class ExamSelectionOver
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
        if (!$period->is_exam_selection_over) {
            return to_route('website.home')->with(
                [
                    'redirected'    =>  'Pengumuman akhir seleksi asisten praktikum ' . $period->name . ' belum diumumkan',
                ]
            );
        }
        return $next($request);
    }
}
