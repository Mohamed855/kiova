<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CustomPlanRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:3|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Plan name is required',
            'name.min'      => 'Plan name length must be between 3-50 characters',
            'name.max'      => 'Plan name length must be between 3-50 characters',
        ];
    }
}
