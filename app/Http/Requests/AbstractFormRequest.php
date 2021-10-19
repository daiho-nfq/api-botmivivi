<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AbstractFormRequest extends FormRequest
{
    public function messages()
    {
        return [
            'required' => '{"validation.required": {"field": ":attribute"}}',
            'confirmed' => '{"validation.confirmed": {"field": ":attribute"}}',
            'min' => '{"validation.min": {"min": :min, "field": ":attribute"}}',
            'max' => '{"validation.max": {"max": :max, "field": ":attribute"}}',
            'exists' => '{"validation.exists": {"field": ":attribute"}}',
            'email' => '{"validation.email": {"field": ":attribute"}}',
            'enum' => '{"validation.enum": {"field": ":attribute"}}',
            'string' => '{"validation.string": {"field": ":attribute"}}',
            'in' => '{"validation.in": {"field": ":attribute", "values": ":values"}}',
            'not_in' => '{"validation.not_in": {"field": ":attribute", "values": ":values"}}',
            'different' => '{"validation.different": {"different": :other, "field": :attribute"}}',
            'regex' => '{"validation.format_invalid": {"field": ":attribute"}}',
            'boolean' => '{"validation.must_be_boolean": {"field": ":attribute"}}',
        ];
    }
}
