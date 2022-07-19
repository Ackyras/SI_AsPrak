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
            ->whereRelation('period_subjects', 'is_pass_file_selection', true)
            ->whereRelation('period_subjects', 'is_pass_exam_selection', true)
            ->whereRelation('period_subjects', 'period_id', $this->period->id)
            ->with(
                [
                    'period_subjects' => function ($query) {
                        $query->where('is_pass_file_selection', true)
                            ->where('is_pass_exam_selection', true);
                    },
                    'period_subjects.subject',
                    'user'
                ]
            )->get();
        foreach ($registrars as $registrar) {
            $user = $registrar->user;
            $user->is_asprak = true;
            $user->save();
            Notification::send($registrar, new PassExamSelection($user, $registrar));
        }
    }
}
