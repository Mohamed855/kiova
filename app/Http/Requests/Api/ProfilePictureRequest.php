<?php

namespace App\Http\Requests\Api;

use Illuminate\Foundation\Http\FormRequest;

class ProfilePictureRequest extends FormRequest
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
            'profile_image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:10000',
        ];
    }

    public function messages(): array
    {
        return [
            'profile_image.required' => 'please upload image first',
            'profile_image.mimes'    => 'This extension not supported',
            'profile_image.max'      => 'Max size is 10 MB',
        ];
    }
}
