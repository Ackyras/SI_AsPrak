<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function periods()
    {
        return $this->belongsToMany(Period::class)->withPivot(['number_of_lab_assistant', 'exam_start', 'exam_end']);
    }
}
