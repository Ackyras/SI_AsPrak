<?php

namespace App\Jobs\Recruitment;

use App\Models\User;
use App\Models\Period;
use App\Models\Registrar;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Notification;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\Registrar\PassExamSelection;

class AnnouncePassExamSelection implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private $period;
    public $user;


    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Period $period)
    {
        //
        $this->period = $period->withoutRelations();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $registrars = Registrar::query()
            ->whereRelation('period_subjects', 'psr.is_pass_file_selection', true)
            // ->whereRelation('period_subjects', 'psr.is_pass_exam_selection', true)
            ->whereRelation('period_subjects', 'period_id', $this->period->id)
            ->with(
                [
                    'user',
                    'period_subjects.subject'
                ]
            )->get()
            //
        ;
        foreach ($registrars as $key => $registrar) {
            $user = $registrar->user;
            if ($registrar->period_subjects()->where('is_pass_exam_selection', true)->exists()) {
                $user->is_asprak = true;
                $user->save();
                $delay = $key + 5;
                Notification::send($registrar, (new PassExamSelection($registrar))->delay($key * 5));
                // $registrar->notify(new PassExamSelection($registrar));
            } else {
                $user->is_active = false;
                $user->save();
            }
        }
    }
}
