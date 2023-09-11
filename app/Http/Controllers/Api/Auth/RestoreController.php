<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;

class RestoreController extends Controller
{
    use GeneralTrait;

    public function restore(): JsonResponse
    {
        return $this->returnSuccess('Restore account page');
    }

    public function send_email_code(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->rules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }
        Password::sendResetLink($request->all());
        return $this->returnSuccess('Password reset link sent successfully');
    }

    protected function rules(): array
    {
        return [
            'email' => 'required|email:rfc,dns|exists:users'
        ];
    }
}
