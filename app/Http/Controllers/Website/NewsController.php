<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Period;
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
        return view('website.pages.news.file_selection', ['period' => $period]);
    }

    public function exam_selection_over(Period $period)
    {
        $period->load('subjects');
        return view('website.pages.news.exam_selection', ['period' => $period]);
    }
}
