<?php

namespace App\Jobs\Period;

use App\Models\Registrar;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class DisableAllUserJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $period;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($period)
    {
        //
        $this->period = $period;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        // $registrars = Registrar::query()
        //     ->whereRelation('')
        $users = User::query()
            ->whereRelation('registrar.period_subjects', 'period_id', $this->period->id)
            ->update(
                [
                    'is_active' => false,
                ]
            );
    }
}
