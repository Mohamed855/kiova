<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CallRequest;
use App\Http\Requests\Api\ContactRequest;
use App\Traits\GeneralTrait;

class ContactController extends Controller
{
    use GeneralTrait;
    public function send_call_request(CallRequest $request, string $id)
    {
        // send call request
    }

    public function send_message(ContactRequest $request, string $id)
    {
        // send message via contact us
    }
}
