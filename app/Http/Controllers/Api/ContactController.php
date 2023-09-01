<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CallRequest;
use App\Http\Requests\Api\ContactRequest;
use App\Traits\GeneralTrait;

class ContactController extends Controller
{
    use GeneralTrait;

    public function contact()
    {
        // contact us page
    }

    public function feedback(ContactRequest $request, string $id)
    {
        // send message via contact us
    }

    public function call_request(CallRequest $request, string $id)
    {
        // send call request
    }
}
