<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Registrar extends Model
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'nim',
        'email',
        'cv',
        'khs',
        'transkrip',
        'period_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function schedules()
    {
        return $this->hasManyThrough(PeriodSubjectRegistrarSchedule::class, PeriodSubjectRegistrar::class, 'registrar_id', 'psr_id', 'id', 'id');
    }

    public function presences()
    {
        return $this->hasManyThrough(Presence::class, PeriodSubjectRegistrar::class, 'registrar_id', 'psr_id');
    }

    public function period_subjects()
    {
        return $this->belongsToMany(PeriodSubject::class, 'psr')->withPivot(
            [
                'id',
                'is_pass_file_selection',
                'is_take_exam_selection',
                'is_pass_exam_selection'
            ]
        );
    }
}
