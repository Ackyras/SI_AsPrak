<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_subject_registrar_id',
        'question_id',
        'choice_id',
        'file',
        'score',
        'extension'
    ];

    public function question()
    {
        return $this->belongsTo(Question::class);
    }

    public function psr()
    {
        return $this->belongsTo(PeriodSubjectRegistrar::class);
    }
}
