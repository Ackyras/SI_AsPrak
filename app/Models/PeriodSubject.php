<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class PeriodSubject extends Model
{
    use HasFactory;

    protected $table = 'period_subject';

    protected $with =
    [
        'subject',
        'period'
    ];

    protected $fillable = [
        'period_id',
        'subject_id',
        'number_of_lab_assistant',
        'exam_start',
        'exam_end',
    ];

    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }
    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function registrars()
    {
        return $this->belongsToMany(Registrar::class)->withPivot(
            [
                'is_pass_file_selection',
                'is_pass_exam_selection'
            ]
        );
    }
}
