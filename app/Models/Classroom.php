<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'name',
        'period_subject_id',
    ];

    public function periodsubject()
    {
        return $this->belongsTo(PeriodSubject::class, 'period_subject_id');
    }
}
