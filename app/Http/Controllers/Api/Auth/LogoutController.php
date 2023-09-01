<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    use GeneralTrait;
    public function logout()
    {
        Auth::logout();
        return $this->successResponse('Successfully logged out');
    }
}
