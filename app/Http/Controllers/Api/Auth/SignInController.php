<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SignInController extends Controller
{
    use GeneralTrait;

    public function sign_in(Request $request): JsonResponse
    {
        $message = $request['message'] ? $request['message'] : '';
        return $this->returnData('Sign In page', [ 'message' => $message ]);
    }

    public function check_credentials(Request $request): JsonResponse
    {
        $credentials = $request->only('email', 'password');

        $validator = Validator::make($credentials, $this->rules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        $token = Auth::guard('api')->attempt($credentials);

        if (!$token) {
            return $this->returnError(401, 'Check your credentials');
        }

        $user = Auth::guard('api')->user();
        $user['token'] = $token;

        return $this->returnData('Signed in successfully', [ 'user' => $user ]);
    }

    protected function rules(): array
    {
        return [
            'email'     => 'required|email',
            'password'  => 'required|string'
        ];
    }
}
