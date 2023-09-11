<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CallRequest;
use App\Models\Feedback;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    use GeneralTrait;

    public function contact()
    {
        return $this->returnSuccess('Contact us page');
    }

    public function feedback(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->feedBackRules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        if ($this->checkToken($request)) {
            $user = Auth::guard('api')->user();
            $user_id =  $user['id'];
        } else {
            $user_id = null;
        }

        $request['user_id'] = $user_id;
        Feedback::create($request->all());
        return $this->returnData('Feedback sent successfully', [ 'requestDetails' => Feedback::latest()->first() ]);
    }

    public function call_request(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), $this->callRequestRules());
        if ($validator->fails()) {
            return $this->returnValidationError($validator);
        }

        if ($this->checkToken($request)) {
            $user = Auth::guard('api')->user();
            $user_id =  $user['id'];
        } else {
            $user_id = null;
        }

        $request['user_id'] = $user_id;
        CallRequest::create($request->all());
        return $this->returnData('Call request sent successfully', [ 'requestDetails' => CallRequest::latest()->first() ]);
    }

    protected function feedBackRules(): array
    {
        return [
            'message' => 'required|string|max:1000',
        ];
    }

    protected function callRequestRules(): array
    {
        return [
            'phone' => 'required|regex:/(01)[0-9]{9}/|max:11',
        ];
    }
}
