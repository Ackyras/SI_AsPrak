<?php

namespace App\Rules;

use App\Models\Period;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;

class NumberOfClassRule implements Rule, DataAwareRule
{
    protected $data = [];
    protected $message;
    protected $period;

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
        // dd(isset($this->data['class_name_prefix']));
        if (!isset($this->data['class_name_prefix'])) {
            $this->message = 'class_name_prefix is required';
            return false;
        }
        if ($this->data['class_name_prefix'] == 'R' && $value > 26) {
            $this->message = 'Number of class exceed 26 for R class';
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
