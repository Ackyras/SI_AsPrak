<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodSubjectRegistrar extends Model
{
    use HasFactory;

    protected $table = 'period_subject_registrar';

    public function registrar()
    {
        return $this->belongsTo(Registrar::class);
    }
    public function period_subject()
    {
        return $this->belongsTo(PeriodSubject::class);
    }
}
