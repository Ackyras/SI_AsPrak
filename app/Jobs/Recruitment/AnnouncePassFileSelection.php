<?php

namespace App\Jobs\Recruitment;

use App\Models\Period;
use App\Models\Registrar;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use App\Notifications\Registrar\PassFileSelection;
use Illuminate\Support\Facades\Notification;

class AnnouncePassFileSelection implements ShouldQueue
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
            ->whereRelation('period_subjects', 'period_id', $this->period->id)
            ->with(
                [
                    'period_subjects' => function ($query) {
                        $query->where('is_pass_file_selection', true);
                    },
                    'period_subjects.subject'
                ]
            )->get();
        foreach ($registrars as $key => $registrar) {
            $user = [];
            $user['email'] = 'siap' . $this->period->id . '.' . $registrar->nim . '@siap.terpadu';
            $user['password'] = Str::random(8);
            $period = $this->period;
            // $newUser = 'Sa';
            $newUser = User::create(
                [
                    'name'      =>  $registrar->name,
                    'email'     =>  $user['email'],
                    'password'  =>  bcrypt($user['password']),
                    'is_admin'  =>  false,
                    'is_asprak' =>  false,
                ]
            );
            $registrar->user_id = $newUser->id;
            $registrar->save();
            if ($newUser) {
                Notification::send($registrar, (new PassFileSelection($user, $registrar))->delay($key * 5));
                // $registrar->notify(new PassFileSelection($user, $registrar));
                // Mail::to($registrar->email)->send(new FileSelectionNotification($maildata));
            }
        }
    }
}
