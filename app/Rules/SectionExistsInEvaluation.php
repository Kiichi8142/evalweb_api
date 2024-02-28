<?php

namespace App\Rules;

use App\Models\Evaluation;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Log;

class SectionExistsInEvaluation implements ValidationRule
{

    protected $evaluationId;

    public function __construct($evaluation_id)
    {
        $this->evaluationId = $evaluation_id;
    }

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $evaluation = Evaluation::find($this->evaluationId);
        if (!$evaluation->sections->contains('id', $value)) {
            $fail('section not exist in evaluation' . $this->evaluationId);
        }
    }
}
