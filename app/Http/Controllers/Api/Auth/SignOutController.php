<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class SignOutController extends Controller
{
    use GeneralTrait;
    public function sign_out(Request $request): JsonResponse
    {
        $token = $request->header('auth_token');

        try {
            JWTAuth::setToken($token)->invalidate();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

        return $this->returnSuccess('Signed out successfully');
    }
}
