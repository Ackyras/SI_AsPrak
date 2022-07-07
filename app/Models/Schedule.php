<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class Schedule extends Model
{
    use HasFactory;

    protected $table = 'schedules';

    protected $fillable = [
        'day',
        'start_time',
        'end_time',
        'classroom_id',
        'room_id',
    ];

    // public function classroom()
    // {
    //     return $this->belongsTo(Classroom::class);
    // }

    // public function room()
    // {
    //     return $this->belongsTo(Room::class);
    // }

    public function period_subject_registrars()
    {
        return $this->belongsToMany(PeriodSubjectRegistrar::class, 'period_subject_registrar');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }
}
