<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class LoginRequest extends FormRequest
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
            'email'     => 'required|email|exists:users',
            'password'  => 'required|min:8|max:30',
        ];
    }

    public function messages(): array
    {
        return [
            'email.required'    => 'Email is required',
            'email.email'       => 'Email not valid',
            'email.exists'      => 'Email not exists',

            'password.required' => 'Password is required',
            'password.min'      => 'Password must be between 8-30 characters',
            'password.max'      => 'Password must be between 8-30 characters',
        ];
    }
}
