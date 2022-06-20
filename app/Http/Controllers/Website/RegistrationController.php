<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registrar\StoreRegistrarRequest;
use App\Models\Period;
use Illuminate\Http\Request;

class RegistrationController extends Controller
{
    //

    public function __construct()
    {
        $this->period = Period::where('is_active', true)->first();
    }

    public function index()
    {
        $period = $this->period;
        $period->load('subjects');
        return view('website.registration.index', compact('period'));
    }

    public function register()
    {
        $period = $this->period;
        $period->load('subjects');
        return view('website.registration.register', compact('period'));
    }

    public function store(StoreRegistrarRequest $request, Period $period)
    {
        $period = $this->period;
        $period->load('subjects');
        return view('website.registration.register', compact('period'));
    }
}
