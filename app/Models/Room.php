<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'building',
    ];

    public function classrooms()
    {
        return $this->belongsToMany(Classroom::class, 'schedules')->withPivot(
            [
                'day',
                'start_time',
                'end_time',
                'classroom_id',
                'room_id',
            ]
        );
    }
}
