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
        'number_of_lab_assistant',
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

    public function psrs()
    {
        return $this->belongsToMany(PeriodSubjectRegistrar::class, 'psr_schedules', 'schedule_id', 'psr_id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function qrs()
    {
        return $this->hasMany(Qr::class);
    }

    public function classroom()
    {
        return $this->belongsTo(Classroom::class);
    }
}
