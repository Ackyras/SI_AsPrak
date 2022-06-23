<?php

namespace App\Http\Controllers;

use App\Models\Period;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $periods = Period::orderBy('id', 'desc')->get();
        return view('website.pages.home.index', compact('periods'));
    }
}
