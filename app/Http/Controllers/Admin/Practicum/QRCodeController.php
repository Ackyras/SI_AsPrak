<?php

namespace App\Http\Controllers\Admin\Practicum;

use App\Models\Qr;
use App\Models\Period;
use App\Models\Classroom;
use Illuminate\Support\Str;
use App\Http\Controllers\Controller;
use App\Http\Requests\Qr\StoreQrRequest;
use App\Http\Requests\Qr\UpdateQrRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class QRCodeController extends Controller
{

    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classrooms = Classroom::query()
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            ->with([
                'period_subject' => [
                    'subject',
                ],
                'schedule' => [
                    'room',
                    'qrs'
                ],
            ])
            ->get()
            ->map(function ($classroom) {
                if ($classroom->schedule) {
                    $classroom->priority = match ($classroom->schedule->day) {
                        now()->addDays(0)->dayName  =>  0,
                        now()->addDays(1)->dayName  =>  1,
                        now()->addDays(2)->dayName  =>  2,
                        now()->addDays(3)->dayName  =>  3,
                        now()->addDays(4)->dayName  =>  4,
                        now()->addDays(5)->dayName  =>  5,
                        now()->addDays(6)->dayName  =>  6,
                    };
                }
                return $classroom;
            })
            ->sortBy('priority')
            // ->dd()
        ;

        return view('admin.pages.practicum.qr-code.index', compact('classrooms'), ['period' => $this->period]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreQrRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreQrRequest $request)
    {
        //
        $validated = $request->validated();
        $token = '';
        do {
            $token = Str::random(16);
        } while (Qr::where('token', $token)->first() instanceof Qr);
        $validated['token'] = $token;
        $validated['end_date'] = now()->addDay();
        if (Qr::create($validated)) {
            return back()->with(
                [
                    'success'   =>  'QR untuk presensi berhasil dibuat',
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'QR gagal dibuat',
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function show(Classroom $classroom)
    {
        //
        $classroom->load(
            [
                'schedule' => [
                    'room',
                    'psrs',
                    'qrs',
                ], 'schedule' => function ($query) {
                    $query->withCount('qrs');
                },
                'period_subject.subject'
            ]
        );

        return view('admin.pages.practicum.qr-code.show', compact('classroom'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function edit(Qr $qr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateQrRequest  $request
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateQrRequest $request, Qr $qr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qr  $qr
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qr $qr)
    {
        //
    }

    public function changeStatus(Request $request, Qr $qr)
    {
        // dd($request->all());
        $validated = $request->validate(
            [
                'status'    =>  'boolean'
            ]
        );
        if ($validated['status']) {
            $qr->updateOrFail(
                [
                    'end_date'  =>  now()->addHours(3),
                ]
            );
        } else {
            $qr->updateOrFail(
                [
                    'end_date'  =>  now()
                ]
            );
        }
        if ($qr->wasChanged()) {
            return back()->with(
                [
                    'success'   =>  'QR Code berhasil ' . $validated['status'] ? 'dibuka' : 'ditutup',
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'Status QR gagal diperbarui'
            ]
        );
    }
}
