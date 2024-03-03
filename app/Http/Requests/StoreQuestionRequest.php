<?php

namespace App\Http\Requests;

use App\Rules\TemplateHasSection;
use Illuminate\Foundation\Http\FormRequest;

class StoreQuestionRequest extends FormRequest
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
        return [
            "name" => 'required|string|max:100',
            "description" => 'required|string|max:255',
            "max_score" => 'integer|max:10',
            "template_id" => 'required|exists:templates,id',
            "section_id" => [
                'required',
                'exists:sections,id',
                new TemplateHasSection($this->template_id)
            ],
        ];
    }
}
