<?php

namespace App\Traits;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

trait GeneralTrait {
    public function returnError ($code, $message): JsonResponse
    {
        return response()->json([
            'success' => false,
            'status'  => $code,
            'message' => $message,
        ]);
    }

    public function returnSuccess ($message): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => $message,
        ]);
    }

    public function returnData ($message, $data): JsonResponse
    {
        return response()->json([
            'success' => true,
            'status'  => 200,
            'message' => $message,
            'data'    => $data,
        ]);
    }

    public function returnValidationError($validator): JsonResponse
    {
        $inputsHasError = array_keys($validator->errors()->toArray());
        $error = $inputsHasError[0] . ' has failed';
        return $this->returnError($error, $validator->errors()->first());
    }

    public function checkToken(Request $request): bool
    {
        $token = $request->header('auth_token');
        $request->headers->set('auth_token', (string) $token, true);
        $request->headers->set('Authorization', 'Bearer ' . $token, true);
        try {
            JWTAuth::parseToken()->authenticate();
            return true;
        } catch (\Exception $e) {
            return false;
        }
    }
}
