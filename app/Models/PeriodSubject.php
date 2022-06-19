<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodSubject extends Model
{
    use HasFactory;

    protected $table = 'period_subject';

    protected $fillable = [
        'period_id',
        'subject_id',
        'number_of_lab_assistant',
        'exam_start',
        'exam_end',
    ];
}
