<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ReviewRequest extends FormRequest
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
            'rate'   => 'required',
            'review' => 'max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'rate.required' => 'Full name is required',
            'review.max'    => 'Review must be smaller than 500 characters',
        ];
    }
}
