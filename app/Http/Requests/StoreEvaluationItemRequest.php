<?php

namespace App\Http\Requests;

use App\Rules\sectionExistsInEvaluation;
use Barryvdh\Debugbar\Facades\Debugbar;
use Illuminate\Contracts\Database\Query\Builder;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreEvaluationItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        Debugbar::info('Hello world');
        return [
            "name" => "required|string|max:255",
            "evaluation_id" => "required|exists:evaluations,id",
            "section_id" => [
                'required',
                'exists:sections,id',
                new SectionExistsInEvaluation($this->evaluation_id)
            ],
        ];
    }
}
