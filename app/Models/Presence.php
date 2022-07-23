<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Presence extends Model
{
    use HasFactory;

    protected $fillable = [
        'psr_id',
        'qr_id',
        'is_valid'
    ];

    public function psr()
    {
        return $this->belongsTo(PeriodSubjectRegistrar::class, 'psr_id', 'id');
    }

    public function qr()
    {
        return $this->belongsTo(Qr::class, 'qr_id', 'id');
    }
}
