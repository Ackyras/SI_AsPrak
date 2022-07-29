<?php

namespace App\Http\Controllers\Admin\ActivePeriod;

use App\Models\Answer;
use App\Models\Period;
use App\Models\Subject;
use App\Models\Registrar;
use Illuminate\Http\Request;
use App\Models\PeriodSubject;
use App\Http\Controllers\Controller;
use App\Models\PeriodSubjectRegistrar;
use Illuminate\Support\Facades\Notification;
use App\Notifications\Registrar\PassExamSelection;
use App\Jobs\Recruitment\AnnouncePassExamSelection;

class ExamSelectionController extends Controller
{
    public $period;

    public function __construct()
    {
        $this->period = Period::firstWhere('is_active', true);
        $this->period->load('subjects');
    }
    public function index()
    {
        $period = $this->period;
        $allsubjects = Subject::whereDoesntHave('periods', function ($query) use ($period) {
            $query->where('period_id', $period->id);
        })->orderBy('name')->get();
        return view('admin.pages.active-period.exam-selection.index', compact('period', 'allsubjects'));
    }

    public function examData()
    {
        $period = $this->period;
        $period->subjects->map(function ($subject) {
            $subject->period_subject = PeriodSubject::query()
                ->withCount(
                    [
                        'registrars' => function ($query) {
                            $query->where('psr.is_pass_file_selection', true);
                        }
                    ]
                )
                ->find($subject->pivot->id);
        });
        // dd($period->subjects);
        return view('admin.pages.active-period.exam-selection.exam-data', compact('period'));
    }

    public function updateExamSelection(Request $req, PeriodSubject $period_subject, PeriodSubjectRegistrar $psr)
    {
        $validated = $req->validate(
            [
                'is_pass_exam_selection'    =>  'required'
            ]
        );
        $psr->updateOrFail($validated);

        if ($psr->wasChanged()) {
            if ($validated['is_pass_exam_selection']) {
                $status = 'lulus';
            } else {
                $status = 'tidak lulus';
            }
            return back()->with(
                [
                    'success'   =>  'Status peserta berhasil diubah menjadi ' . $status . ' seleksi berkas',
                ]
            );
        }
        return back()->with(
            [
                'failed'   =>  'Gagal mengubah status peserta',
            ]
        );
    }

    public function examDataDetail(PeriodSubject $period_subject)
    {
        $period_subject_registrar = PeriodSubjectRegistrar::query()
            ->where('period_subject_id', $period_subject->id)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'registrar',
                    'answers'
                ]
            )
            ->get();
        $period_subject->load(
            [
                'questions'
            ]
        )->loadsum('questions', 'score');

        foreach ($period_subject->questions as $question) {
            if ($question->type == 'essay') {
                $period_subject->essay_score += $question->score;
            } else {
                $period_subject->choice_score += $question->score;
            }
        }

        $period_subject_registrar->map(function ($psr) {
            $psr->essay_score = 0;
            $psr->total_essay_score = 0;
            $psr->choice_score = 0;
            $psr->total_choice_score = 0;
            foreach ($psr->answers as $answer) {
                if ($answer->type == 'essay') {
                    $psr->essay_score += $answer->pivot->score;
                } else {
                    $psr->choice_score += $answer->pivot->score;
                }
            }
        });
        // dd($period_subject_registrar);
        return view('admin.pages.active-period.exam-selection.exam-data-detail', compact('period_subject', 'period_subject_registrar'));
    }

    public function registrarExamData(PeriodSubject $period_subject, PeriodSubjectRegistrar $psr)
    {
        $registrar = $psr->registrar;
        $period_subject->load(
            [
                'questions' => [
                    'choices'
                ]
            ]
        )->loadsum('questions', 'score');

        foreach ($period_subject->questions as $question) {
            if ($question->type == 'essay') {
                $period_subject->essay_score += $question->score;
            } else {
                $period_subject->choice_score += $question->score;
            }
        }
        $psr->load(
            [
                'registrar',
                'answers'
            ],
        );
        $psr->essay_score = 0;
        $psr->total_essay_score = 0;
        $psr->choice_score = 0;
        $psr->total_choice_score = 0;
        foreach ($psr->answers as $answer) {
            if ($answer->type == 'essay') {
                $psr->essay_score += $answer->score;
            } else {
                $psr->choice_score += $answer->score;
            }
        }
        // dd($psr);
        // dd($period_subject->questions, $psr->id);
        return view('admin.pages.active-period.exam-selection.registrar-exam-data', compact('period_subject', 'psr'));
    }

    public function passSelection()
    {
        $period_subject_registrars = PeriodSubjectRegistrar::query()
            ->whereRelation('period_subject', 'period_id', $this->period->id)
            // ->whereRelation('answers', 'answers.score', '>', 0)
            ->where('is_pass_exam_selection', true)
            ->where('is_pass_file_selection', true)
            ->with(
                [
                    'registrar',
                    'period_subject.subject',
                    'answers'
                ]
            )
            ->get();
        $period_subject_registrars->map(function ($psr) {
            $psr->total_score = 0;
            $psr->question_score = 0;
            foreach ($psr->answers as $answer) {
                $psr->total_score += $answer->pivot->score;
                $psr->question_score += $answer->score;
            }
        });
        $subjects = $this->period->subjects;
        $subjects->map(function ($subject) {
            $subject->pass_exam_count = PeriodSubjectRegistrar::query()
                ->where('period_subject_id', $subject->pivot->id)
                ->where('is_pass_exam_selection', true)
                // ->get()
                ->count()
                //
            ;
        });
        return view('admin.pages.active-period.exam-selection.pass-selection-registrar', compact('period_subject_registrars', 'subjects'));
    }

    public function announceExamSelectionResult()
    {
        $period = $this->period;
        // if ($period->is_exam_selection_over) {
        //     return back()->with(
        //         [
        //             'failed'    =>  'Pengumuman sudah dibuat, tidak dapat lagi mengubah ataupun mengumumkan kelulusan asisten praktikum'
        //         ]
        //     );
        // }
        AnnouncePassExamSelection::dispatch($period);
        return back()->with(
            [
                'success'   => 'Kelulusan berhasil diumumkan'
            ]
        );
    }

    public function updateAnswerScore(Request $req, PeriodSubject $period_subject, PeriodSubjectRegistrar $psr, Answer $answer)
    {
        $validated = $req->validate(
            [
                'score' =>  'required',
            ]
        );
        // dd($validated);
        // dd($answer);
        $answer->update(
            $validated
        );
        if ($answer->wasChanged()) {
            return back()->with(
                [
                    'success'   =>  'Nilai berhasil diperbarui'
                ]
            );
        }
        return back()->with(
            [
                'failed'   => 'Gagal memperbarui nilai'
            ]
        );
    }
}
