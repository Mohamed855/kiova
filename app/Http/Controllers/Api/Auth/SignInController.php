<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignInController extends Controller
{
    use GeneralTrait;

    public function signin(LoginRequest $request)
    {
        //
    }


    public function check_credentials(LoginRequest $request)
    {
        $credentials = $request->only('email', 'password');
        $token = Auth::attempt($credentials);

        if (!$token) {
            return $this ->errorResponse(401, 'Unauthorized');
        }

        $user = Auth::user();

        return $this->dataResponse('authorization', [
            'user'  => $user,
            'token' => $token,
            'type'  => 'bearer',
        ], 'Logged in Successfully');
    }
}
