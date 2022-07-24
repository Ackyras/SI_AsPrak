<?php

namespace Database\Seeders\Testing;

use App\Models\Period;
use App\Models\Registrar;
use App\Models\PeriodSubject;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PeriodSubjectRegistrarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $period = Period::firstWhere('is_active', true);
        $period_subjects = PeriodSubject::where('period_id', $period->id)->get();
        $registrars = Registrar::factory()->count(20)->create();
        foreach ($registrars as $registrar) {
            $registrar->period_subjects()->attach($period_subjects->random(3));
            foreach ($registrar->period_subjects as $period_subject) {
                $is_pass_file_selection = rand(0, 1);
                if ($is_pass_file_selection) {
                    $registrar->period_subjects()->updateExistingPivot(
                        $period_subject->id,
                        [
                            'is_pass_file_selection'    => true,
                        ]
                    );
                }
            }
        }
        $passed_file_selection_registrars = Registrar::query()
            ->whereRelation('period_subjects.period', 'is_active', true)
            ->whereRelation('period_subjects', 'psr.is_pass_file_selection', true)
            ->get();
        foreach ($passed_file_selection_registrars as $registrar) {
            $user = User::create(
                [
                    'name'          =>  $registrar->name,
                    'email'         =>  'siap' . $period->id . '.' . $registrar->nim . '@siap.terpadu',
                    'password'      =>  bcrypt('password'),
                ]
            );
            $registrar->user_id = $user->id;
            $registrar->save();
        }
    }
}
