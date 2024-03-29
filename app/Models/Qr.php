<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Qr extends Model
{
    use HasFactory;

    protected $fillable =
    [
        'token',
        'schedule_id',
        'end_date',
    ];

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    public function period_subject_registrars()
    {
        return $this->belongsToMany(
            PeriodSubjectRegistrar::class,
            'presences',
            'qr_id',
            'psr_id'
        )->withPivot(
            [
                'id',
                'qr_id',
                'psr_id',
                'is_valid',
            ]
        );
    }

    public function presenceds()
    {
        return $this->hasMany(Presence::class);
    }
}
