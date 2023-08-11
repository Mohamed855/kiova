<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegistRequest;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use GeneralTrait;
    public function login(LoginRequest $request)
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

    public function register(RegistRequest $request)
    {
        $user = User::create([
            'name'          => $request->name,
            'email'         => $request->email,
            'phone'         => $request->phone,
            'password'      => Hash::make($request->password),
            'profile_image' => null,
            'role'          => 3,
            'plan_id'       => null,
        ]);

        return $this->dataResponse('user', $user, 'User created successfully');
    }

    public function logout()
    {
        Auth::logout();
        return $this->successResponse('Successfully logged out');
    }

    public function refresh()
    {
        return $this->dataResponse('authorization', [
            'user' => Auth::user(),
            'token' => Auth::refresh(),
            'type'  => 'bearer',
        ], 'Logged in Successfully');
    }
}
