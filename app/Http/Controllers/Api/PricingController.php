<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomPlanRequest;
use App\Traits\GeneralTrait;

class PricingController extends Controller
{
    use GeneralTrait;
    public function pricing ()
    {
        // return all plans
    }

    public function custom_plan (CustomPlanRequest $request)
    {

    }
}
