<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Subject\StoreSubjectRequest;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::all();
        return view('admin.pages.datamaster.subjects.index', compact('subjects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.pages.datamaster.subjects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSubjectRequest $request)
    {
        //
        $validated = $request->validated();
        $subject = Subject::create($validated);
        if ($subject) {
            return to_route('admin.data-master.subject.index')->with(
                [
                    'success'   =>  'Mata Kuliah baru berhasil dibuat'
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Mata Kuliah baru gagal dibuat'
            ]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
        return view('admin.pages.datamaster.subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
        $validated = $request->validated();
        Subject::create($validated);
        return to_route('admin.data-master.subject.index')->with(
            [
                'success'   =>  'Mata Kuliah baru berhasil dibuat'
            ]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  Subject $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
        $subject->deleteOrFail();
        return to_route('admin.data-master.subject.index')->with(
            [
                'success'   =>  'Mata Kuliah berhasil dihapus'
            ]
        );
    }
}
