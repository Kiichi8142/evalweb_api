<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class EvaluationItemScoreNotExceedLimit implements ValidationRule
{

    protected $limit;

    public function __construct($limit)
    {
        $this->limit = $limit;
    }


    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value > $this->limit) {
            $fail('The score must not exceed the limit: ' . $this->limit);
        }
    }
}
