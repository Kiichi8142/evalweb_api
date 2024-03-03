<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TemplateHasSection implements ValidationRule
{

    protected $templateId;

    public function __construct($templateId)
    {
        $this->templateId = $templateId;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $temm = DB::table('section_template')->where('template_id', $this->templateId)->where('section_id', $value)->exists();
        Log::info((bool) $temm);

        if (!$temm) {
            $fail('Section not exist in this template ' . $this->templateId);
        }
    }
}
