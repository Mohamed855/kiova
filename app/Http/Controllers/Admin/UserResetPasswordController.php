<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Traits\GeneralTrait;
use Illuminate\Contracts\View\View;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class UserResetPasswordController extends Controller
{
    use GeneralTrait;

    public function showResetForm(Request $request, $token): View|JsonResponse
    {
        $email = $request['email'];

        $validator = Validator::make($request->all(), $this->resetFormRules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        $user = User::where('email', $email)->first();

        if ($user && Password::broker()->tokenExists($user, $token)) {
            return view('Admin.userPasswordReset')->with([ 'email' => $email ]);
        } else {
            abort(404);
        }
    }

    public function reset(Request $request): JsonResponse|RedirectResponse
    {
        $email = $request['email'];
        $hashedPassword = Hash::make($request['password']);

        $validator = Validator::make($request->all(), $this->resetRules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        try {
            User::where('email', $email)->update([ 'password' => $hashedPassword ]);
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }

        return redirect()->route('sign_in', [
            'api_password' => env('API_PASSWORD'),
            'message' => 'Password updated successfully'
        ]);
    }

    protected function resetFormRules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|exists:users',
        ];
    }
    protected function resetRules(): array
    {
        return [
            'email'    => 'required|email:rfc,dns|exists:users',
            'password' => 'required|confirmed',
        ];
    }
}
