<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Choice;
use App\Models\Question;
use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Question\StoreQuestionRequest;
use App\Http\Requests\Question\UpdateQuestionRequest;
use App\Models\Period;

class QuestionController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
    }

    public function index(PeriodSubject $period_subject)
    {
        $period_subject->load(['questions.choices']);
        // dd($period_subject->questions);
        return view('admin.pages.active-period.period-subject-question.index', compact('period_subject'));
    }

    public function create(PeriodSubject $period_subject)
    {
        return view('admin.pages.active-period.period-subject-question.create', compact('period_subject'));
    }

    public function store(StoreQuestionRequest $request, PeriodSubject $period_subject)
    {
        // dd($request->all());
        //
        $period_subject->load('subject');
        $validated = $request->validated();
        if ($validated['image']) {
            $image = $request->file('image');
            $imageFileName = $period_subject->subject->name . '_question_image_' . $image->hashName();
            // dd($imageFileName);

            $storeimage = Storage::disk('public')->putFileAs(
                'period/' . $this->period->id . '/subject/' . $period_subject->subject->name . '/question/',
                $image,
                $imageFileName
            );
            $validated['image'] = $storeimage;
        }
        $validated['period_subject_id'] = $period_subject->id;
        $question = Question::create($validated);
        $validated['question_id'] = $question->id;
        if ($question) {
            if ($validated['type'] == 'pilihan berganda') {
                $choices = [];
                foreach ($validated['choice']['option'] as $key => $value) {
                    // $new_choice = Choice
                    if ($validated['choice']['image'][$key]) {
                        $image = $validated['choice']['image'][$key];
                        $imageFileName = $period_subject->subject->name . '_choice_image_' . $image->hashName() . $image->extension();
                        // dd($imageFileName);

                        $storeimage = Storage::disk('public')->putFileAs(
                            'period/' . $this->period->id . '/subject/' . $period_subject->subject->name . '/question/choiceImage/',
                            $image,
                            $imageFileName
                        );
                        $validated['choice']['image'][$key] = $storeimage;
                    }
                    $choice = Choice::create(
                        [
                            'text'          =>  $validated['choice']['text'][$key],
                            'option'        =>  $validated['choice']['option'][$key],
                            'image'         =>  $validated['choice']['image'][$key],
                            'is_true'       =>  $validated['choice']['is_true'][$key],
                            'question_id'   =>  $validated['choice']['question_id'][$key],
                        ]
                    );
                    array_push($choices, $choice);
                }
            }
            return back()->with(
                [
                    'success'   =>  'Soal baru berhasil ditambahkan',
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'Soal baru gagal dibuat',
            ],
        );
    }

    public function show(Question $question)
    {
        dd($request->request);
    }

    public function edit(Question $question)
    {
        //
    }

    public function update(UpdateQuestionRequest $request, Question $question, PeriodSubject $period_subject)
    {
        //
        $period_subject->load('subject');
        $validated = $request->validated();
        if ($validated['image']) {
            $image = $request->file('image');
            $imageFileName = $period_subject->subject->name . '_question_image_' . $image->hashName() . $image->extension();
            // dd($imageFileName);

            $storeimage = Storage::disk('public')->putFileAs(
                'period/' . $this->period->id . '/subject/' . $period_subject->subject->name . '/question/',
                $image,
                $imageFileName
            );
            $validated['image'] = $storeimage;
        }
        $question = Question::create($validated);
        $validated['question_id'] = $question->id;
        if ($question) {
            if ($validated['type'] == 'pilihan berganda') {
                $choices = [];
                foreach ($validated['choice']['option'] as $key => $value) {
                    // $new_choice = Choice
                    if ($validated['choice']['image'][$key]) {
                        $image = $validated['choice']['image'][$key];
                        $imageFileName = $period_subject->subject->name . '_choice_image_' . $image->hashName() . $image->extension();
                        // dd($imageFileName);

                        $storeimage = Storage::disk('public')->putFileAs(
                            'period/' . $this->period->id . '/subject/' . $period_subject->subject->name . '/question/choiceImage/',
                            $image,
                            $imageFileName
                        );
                        $validated['choice']['image'][$key] = $storeimage;
                    }
                    $choice = Choice::create(
                        [
                            'text'          =>  $validated['choice']['text'][$key],
                            'option'        =>  $validated['choice']['option'][$key],
                            'image'         =>  $validated['choice']['image'][$key],
                            'is_true'       =>  $validated['choice']['is_true'][$key],
                            'question_id'   =>  $validated['choice']['question_id'][$key],
                        ]
                    );
                    array_push($choices, $choice);
                }
            }
            return back()->with(
                [
                    'success'   =>  'Soal baru berhasil ditambahkan',
                ]
            );
        }
        return back()->with(
            [
                'failed'    =>  'Soal baru gagal dibuat',
            ],
        );
    }

    public function destroy(PeriodSubject $period_subject, Question $question)
    {
        //
        if ($question->deleteOrFail()) {
            return back()->with(
                [
                    'warning'   =>  'Soal berhasil dihapus',
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Soal gagal dihapus',
            ]
        );
    }
}
