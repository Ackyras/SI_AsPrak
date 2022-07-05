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
        return $this->belongsToMany(Classroom::class, 'schedule');
    }
}
