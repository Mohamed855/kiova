<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use \Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class SignInController extends Controller
{
    public function sign_in(): View
    {
        return view('index');
    }
}
