<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'text',
        'type',
        'score',
        'period_subject_id',
    ];

    public function period_subject()
    {
        return $this->belongsTo(PeriodSubject::class);
    }

    public function choices()
    {
        return $this->hasMany(Choice::class);
    }

    public function period_subject_registrars()
    {
        return $this->belongsToMany(PeriodSubjectRegistrar::class, 'answers')->withPivot(
            [
                'file',
                'choice_id'
            ]
        );
    }
}
