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
        'password',
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
}
