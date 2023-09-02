<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LoginRequest;
use App\Http\Requests\Api\RegistRequest;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class SignUpController extends Controller
{
    use GeneralTrait;

    public function sign_up()
    {
        //
    }
    public function store_details(RegistRequest $request)
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
}
