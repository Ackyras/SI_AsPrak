<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Period;
use App\Models\Subject;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class PeriodController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index()
    {
        $period = $this->period;
        // dd(asset(Storage::url($period->selection_poster)));
        return view('admin.pages.active-period.period.index', compact('period'));
    }
}
