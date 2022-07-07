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

    public function schedules()
    {
        return $this->hasMany(Schedules::class);
    }

    public function presence()
    {
        return $this->belongsToMany(User::class)->withPivot(
            [
                'id',
                'token',
                'shcedule_id',
                'user_id',
                'end_date',
            ]
        );
    }
}
