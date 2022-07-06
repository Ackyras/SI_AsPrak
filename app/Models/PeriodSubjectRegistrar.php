<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodSubjectRegistrar extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'period_subject_id',
        'registrar_id',
        'is_pass_file_selection',
        'is_take_exam_selection',
        'is_pass_exam_selection',
    ];

    public function registrar()
    {
        return $this->belongsTo(Registrar::class);
    }
    public function period_subject()
    {
        return $this->belongsTo(PeriodSubject::class);
    }

    public function answers()
    {
        return $this->belongsToMany(Question::class, 'answers')
            ->withPivot(['choice_id', 'file']);
    }

    public function schedule()
    {
        return $this->belongsToMany(Schedule::class);
    }
}
