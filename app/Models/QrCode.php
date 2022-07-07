<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
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
        return $this->belongsToMany(PeriodSubjectRegistrar::class)->withPivot(
            [
                'id',
                'qr_id',
                'psr_id',
                'is_valid',
            ]
        );
    }
}
