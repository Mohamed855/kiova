<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Validator;

class SignUpController extends Controller
{
    use GeneralTrait;

    public function sign_up(): JsonResponse
    {
        return $this->returnSuccess('Sign Up page');
    }
    public function store_details(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        $user = User::create($request->all());
        return $this->returnData( 'User created successfully', [ 'user' => $user ]);
    }

    protected function rules(): array
    {
        return [
            'name'      => 'required|min:3|max:30',
            'email'     => 'required|email:rfc,dns|max:30|unique:users',
            'phone'     => 'required|regex:/(01)[0-9]{9}/',
            'password'  => 'required|min:8|max:16|string|confirmed'
        ];
    }
}
