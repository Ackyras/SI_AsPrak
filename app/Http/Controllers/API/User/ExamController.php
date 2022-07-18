<?php

namespace App\Http\Controllers\API\User;

use App\Http\Controllers\Controller;
use App\Models\Period;
use App\Models\Question;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ExamController extends Controller
{
    //
    public function storeChoiceAnswer(Request $req)
    {
        $validated = $req->validate(
            [
                'question_id'   =>  'required',
                'choice_id'     =>  'filled',
                'user_id'       =>  'required'
            ]
        );
        return response()->json(
            $validated
        );
    }
    public function storeChoiceAnswers(Request $req)
    {
        $validated = $req->validate(
            [
                'question_id.*'   =>  'nullable',
                'choice_id.*'     =>  'nullable',
                'user_id.*'       =>  'required'
            ]
        );
        return response()->json(
            $validated
        );
    }

    public function storeEssayAnswer(Request $req)
    {
        $validated = $req->validate(
            [
                'question_id'   =>  'required',
                'answer'        =>  ['required', 'file', 'mimes:doc,docx,pdf,txt,csv', 'max:2048'],
                'user_id'       =>  'required',
            ]
        );
        $user = User::with('registrar')->find($validated['user_id']);
        $question = Question::with('period_subject')->find($validated['question_id']);
        $period = Period::where('is_active', true)->first();
        $answer = $req->file('answer');
        $answerFileName = 'question_' . $question->id . '_answer_' . $answer->hashName();
        // dd($answerFileName);

        $storeanswer = Storage::disk('public')->putFileAs(
            'period/' . $period->id . '/registrar/' . $user->registrar->nim . '/',
            $answer,
            $answerFileName
        );
        return response()->json(
            [
                $user,
                $period,
                $question
            ]
        );
    }
}
