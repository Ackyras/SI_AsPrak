<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Period extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'registration_start',
        'registration_end',
    ];

    public function registrars()
    {
        return $this->hasMany(Registrar::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot(['number_of_lab_assistant', 'exam_start', 'exam_end']);
    }
}
