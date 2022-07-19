<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Prunable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Prunable;

    protected $with = [
        'registrar'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function registrar()
    {
        return $this->hasOne(Registrar::class);
    }

    public function prunable()
    {
        // return static::where('created_at', '<=', now()->subMonth());
        $period = Period::firstWhere('is_active', true);
        return static::query()
            ->where('is_admin', false)
            ->whereRelation('registrar.period_subject', 'period_id', '<', $period->id)
            //
        ;
    }
    protected function pruning()
    {
        //
        $period = Period::firstWhere('is_active', true);
        $users = User::query()
            ->where('is_admin', false)
            ->whereRelation('registrar.period_subject.period', 'is_active', false)
            ->with('registrars')
            ->get();
        foreach ($users as $user) {
            $user->registrar->user_id = null;
            $user->registrar->save();
        }
    }
}
