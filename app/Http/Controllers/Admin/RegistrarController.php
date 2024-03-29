<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Registrar;
use App\Http\Requests\Registrar\StoreRegistrarRequest;
use App\Http\Requests\Registrar\UpdateRegistrarRequest;
use Illuminate\Support\Facades\Storage;

class RegistrarController extends Controller
{
    public function index()
    {
        $registrars = Registrar::query()
            ->with('period_subjects.subject')
            ->when(
                request()->query('period'),
                function ($query) {
                    $query->where('period_id', request()->query('period'));
                }
            )
            ->get();


        return view('admin.pages.datamaster.registrar.index', compact('registrars'));
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
     * @param  \App\Http\Requests\StoreRegistrarRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreRegistrarRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function show(Registrar $registrar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function edit(Registrar $registrar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateRegistrarRequest  $request
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateRegistrarRequest $request, Registrar $registrar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Registrar  $registrar
     * @return \Illuminate\Http\Response
     */
    public function destroy(Registrar $registrar)
    {
        //
    }

    public function publish()
    {
    }
}
