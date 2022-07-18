<?php

namespace App\Rules;

use App\Models\Period;
use App\Models\PeriodSubject;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\Rule;

class PeriodSubjectDateTime implements Rule, DataAwareRule
{
    protected $data = [];
    protected $period;
    protected $message;
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
        $this->period = Period::firstWhere('is_active', true);
    }

    public function setData($data)
    {
        $this->data = $data;

        return $this;
    }


    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //
        $period_subject = PeriodSubject::query()
            ->where('period_id', $this->period->id)
            ->where('exam_start', '<=', $value)
            ->where('exam_end', '>=', $value)
            ->get()
            ->count()
            //
        ;
        if ($period_subject > 1) {
            $this->message = 'there are already more than 2 exams that take place at ' . $value;
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }
}
