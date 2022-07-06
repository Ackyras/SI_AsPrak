<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use AjCastro\EagerLoadPivotRelations\EagerLoadPivotTrait;

class Classroom extends Model
{
    use HasFactory, EagerLoadPivotTrait;

    protected $fillable =
    [
        'name',
        'period_subject_id',
    ];

    public function period_subject()
    {
        return $this->belongsTo(PeriodSubject::class, 'period_subject_id');
    }

    // public function schedule()
    // {
    //     return $this->hasMany(Schedule::class);
    // }

    public function schedules()
    {
        return $this->belongsToMany(Room::class, 'schedules')->withPivot(
            [
                'day',
                'start_time',
                'end_time',
                'classroom_id',
                'room_id',
                'id'
            ]
        )->using(Schedule::class);
    }
}
