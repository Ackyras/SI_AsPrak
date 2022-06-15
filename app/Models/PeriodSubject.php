<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'period_id',
        'subject_id',
        'number_of_lab_asistant',
        'exam_start',
        'exam_end',
    ];
}
