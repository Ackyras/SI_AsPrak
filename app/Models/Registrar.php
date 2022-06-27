<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Registrar extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username',
        'nim',
        'cv',
        'khs',
        'transkrip',
        'period_id',
    ];

    public function period()
    {
        return $this->belongsTo(Period::class);
    }

    public function period_subjects()
    {
        return $this->belongsToMany(PeriodSubject::class)->withPivot(
            [
                'is_pass_file_selection',
                'is_pass_exam_selection'
            ]
        );
    }
}
