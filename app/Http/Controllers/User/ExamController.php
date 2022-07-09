<?php

namespace App\Http\Controllers\User;

use Inertia\Inertia;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Support\Facades\Storage;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class ExamController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::where('is_active', true)->first();
    }

    public function index()
    {
        $user = auth()->user()->registrar;
        $user->load('period_subjects');
        // dd($user);
        return Inertia::render('Exam/Index', [
            'user'      => $user,
        ]);
    }

    public function exam(PeriodSubject $period_subject)
    {
        $user = auth()->user()->registrar;
        $period_subject->load('questions.choices');

        return Inertia::render('Exam/TakeExam', [
            'user'      => $user,
            'period_subject'   => $period_subject
        ]);
    }

    // public function storeAnswer(Request $request, PeriodSubject $subject, Question $question)
    // {
    //     $validated = $request->validate(
    //         [
    //             'answer'    =>  'required',
    //         ]
    //     );
    //     dd($validated);
    // }
    public function storeAll(Request $request, PeriodSubject $period_subject)
    {
        $transformRequests = [];
        $registrar = auth()->user()->registrar;
        $period_subject_registrar = PeriodSubjectRegistrar::query()
            ->where('period_subject_id', $period_subject->id)
            ->Where('registrar_id', $registrar->id)
            ->first();
        foreach ($request->questions as $key => $value) {
            $tempRequest['question_id'] =   $value;
            $tempRequest['file'] = null;
            $tempRequest['choice_id'] = null;
            $question = Question::find($value);
            if ($question->type == 'essay') {
                $tempRequest['file'] =   $request->answers[$key];
            } else {
                $tempRequest['choice_id'] = $request->answers[$key];
            }
            array_push($transformRequests, $tempRequest);
        }
        foreach ($transformRequests as $transformRequest) {
            if (isset($transformRequest['file'])) {
                $file = $transformRequest['file'];
                $fileName = $registrar['nim'] . 'file_' . $file->hashName() . $file->extension();
                // dd($fileFileName);

                $storefile = Storage::disk('local')->putFileAs(
                    'period/' . $this->period->id . '/Exam/' . $period_subject->subject->name . '/' . $registrar->nim,
                    $file,
                    $fileName
                );
                $transformRequest['file'] = $storefile;
            }

            $period_subject_registrar->answers()->attach(
                $transformRequest['question_id'],
                $transformRequest
            );
        }
        return to_route('user.take.exam',);
    }
}
