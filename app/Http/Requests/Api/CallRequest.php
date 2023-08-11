<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class CallRequest extends FormRequest
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
            'phone' => 'required|regex:/(01)[0-9]{9}/',
        ];
    }

    public function messages(): array
    {
        return [
            'phone.required' => 'Phone number is required',
            'phone.regex'    => 'Please enter a valid number',
        ];
    }
}
