<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Http\Requests\Registrar\StoreRegistrarRequest;
use App\Models\Period;
use App\Models\PeriodSubject;
use App\Models\Registrar;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        // ddd($period);
        return view('website.pages.registration.index', compact('period'));
    }

    public function store(StoreRegistrarRequest $request, Period $period)
    {
        $period = $this->period;
        $validated = $request->validated();
        // dd($validated);
        $oldRegistrar = Registrar::where('nim', $validated['nim'])->with('period_subjects')->first();
        foreach ($validated['subject'] as $key => $value) {
            echo $value;
        }
        dd($validated);
        if ($oldRegistrar) {
            return to_route('website.registration.index', $period)->with(['success' => 'Anda sudah tidak dapat mengajukan pendaftaran']);
        }
        $cv = $request->file('cv');
        $cvFileName = $validated['nim'] . '_cv_' . $cv->getClientOriginalName();

        $storecv = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $cv,
            $cvFileName
        );
        $cv = $request->file('cv');
        $cvFileName = $validated['nim'] . '_cv_' . $cv->getClientOriginalName();
        // dd($cvFileName);

        $storecv = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $cv,
            $cvFileName
        );
        $khs = $request->file('khs');
        $khsFileName = $validated['nim'] . '_khs_' . $khs->getClientOriginalName();
        // dd($khsFileName);

        $storekhs = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $khs,
            $khsFileName
        );
        $transkrip = $request->file('transkrip');
        $transkripFileName = $validated['nim'] . '_transkrip_' . $transkrip->getClientOriginalName();
        // dd($transkripFileName);

        $storetranskrip = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $transkrip,
            $transkripFileName
        );
        $validated['cv'] = $storecv;
        $validated['khs'] = $storekhs;
        $validated['transkrip'] = $storetranskrip;

        $registrar = Registrar::create($validated);
        return to_route('website.registration.index', $period)->with(['success' => 'Anda berhasil mendaftar']);
        // return view('website.registration.register', compact('period'));
    }
}
