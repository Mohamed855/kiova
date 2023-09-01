<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDetailsRequest extends FormRequest
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
            'name'          => 'required|min:10|max:50',
            'email'         => 'required|string|email|max:255|unique:users',
            'phone'         => 'required|regex:/(01)[0-9]{9}/',
            'password'      => 'required||min:8|max:16|confirmed|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required'          => 'Full name is required',
            'name.min'               => 'Full name must be between 10-50 characters',
            'name.max'               => 'Full name must be between 10-50 characters',

            'email.required'         => 'Email is required',
            'email.email'            => 'Email not valid',
            'email.max'              => 'Email max length is 255 characters',
            'email.unique'           => 'Email is already exist',

            'phone.required'         => 'Phone number is required',
            'phone.regex'            => 'Please enter a valid number',

            'password.required'      => 'Password is required',
            'password.min'           => 'Password must be between 8-16 characters',
            'password.max'           => 'Password must be between 8-16 characters',
            'password.regex'         => 'Password must contains numbers, characters upper-lower case and special characters',

            'profile_image.required' => 'please upload image first',
            'profile_image.mimes'    => 'This extension not supported',
            'profile_image.max'      => 'Max size is 10 MB',
        ];
    }
}
