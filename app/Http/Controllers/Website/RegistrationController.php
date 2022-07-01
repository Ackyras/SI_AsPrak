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
    // public $period;

    // public function __construct()
    // {
    //     $this->period = Period::where('is_active', true)->first();
    // }

    public function index(Period $period)
    {
        $period->load('subjects');
        // ddd($period);
        return view('website.pages.registration.index', compact('period'));
    }

    public function store(StoreRegistrarRequest $request, Period $period)
    {
        $validated = $request->validated();
        // dd($validated);
        $oldRegistrar = Registrar::query()
            ->with('period_subjects', function ($query) use ($period) {
                $query->where('period_id', $period->id);
            })
            ->where('nim', $request->nim)
            ->first();
        // dd($oldRegistrar);
        // dd($oldRegistrar->period_subjects->contains($this->period->id));
        if ($oldRegistrar) {
            return to_route('website.registration.index', $period)->with(['failed' => 'Anda sudah tidak dapat mengajukan pendaftaran']);
        }
        $cv = $request->file('cv');
        $cvFileName = $validated['nim'] . '_cv_' . $cv->hashName() . $cv->extension();

        $storecv = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $cv,
            $cvFileName
        );
        $transkrip = $request->file('transkrip');
        $transkripFileName = $validated['nim'] . '_transkrip_' . $transkrip->hashName() . $transkrip->extension();
        // dd($transkripFileName);

        $storetranskrip = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $cv,
            $cvFileName
        );
        $khs = $request->file('khs');
        $khsFileName = $validated['nim'] . '_khs_' . $khs->hashName() . $cv->extension();
        // dd($khsFileName);

        $storekhs = Storage::disk('local')->putFileAs(
            'period/' . $period->id . '/registrar/' . $validated['nim'] . '/',
            $khs,
            $khsFileName
        );
        $transkrip = $request->file('transkrip');
        $transkripFileName = $validated['nim'] . '_transkrip_' . $transkrip->hashName() . $cv->extension();
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
        foreach ($validated['subject'] as $subject) {
            $registrar->period_subjects()->attach($subject);
        }
        return to_route('website.registration.index', $period)->with(['success' => 'Anda berhasil mendaftar']);
        // return view('website.registration.register', compact('period'));
    }
}
