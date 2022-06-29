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
        'is_active',
        'is_active_date',
        'is_open_for_selection',
        'is_open_for_selection_date',
        'is_file_selection_over',
        'is_file_selection_over_date',
        'is_exam_selection_over',
        'is_exam_selection_over_date',
        'selection_poster',
    ];

    public function registrars()
    {
        return $this->hasMany(Registrar::class);
    }

    public function subjects()
    {
        return $this->belongsToMany(Subject::class)->withPivot(['number_of_lab_assistant', 'exam_start', 'exam_end', 'id']);
    }
}
