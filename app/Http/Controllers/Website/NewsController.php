<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    //

    public function open_for_selection(Period $period)
    {
        // dd($period);
        $period->load('subjects');
        return view('website.pages.news.registration', ['period' => $period]);
    }

    public function file_selection_over(Period $period)
    {
        $period->load('subjects');
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'period_subject'   => function ($query) use ($period) {
                        $query->where('period_id', $period->id);
                    },
                    'registrar',
                    'period_subject.subject'
                ]
            )->get()
            //
        ;
        return view('website.pages.news.file_selection', compact('psrs'), ['period' => $period]);
    }

    public function exam_selection_over(Period $period)
    {
        $period->load('subjects');
        $period->load('subjects');
        $psrs = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $period->id)
            ->where('is_pass_file_selection', true)
            ->where('is_pass_exam_selection', true)
            ->with(
                [
                    'period_subject'   => function ($query) use ($period) {
                        $query->where('period_id', $period->id);
                    },
                    'registrar',
                    'period_subject.subject'
                ]
            )->get()
            //
        ;
        return view('website.pages.news.exam_selection', compact('psrs'), ['period' => $period]);
    }
}
