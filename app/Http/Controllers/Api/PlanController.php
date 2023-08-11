<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\CustomPlanRequest;
use App\Traits\GeneralTrait;

class PlanController extends Controller
{
    use GeneralTrait;
    public function get_plans ()
    {
        // return all plans
    }
    public function get_plan_services ()
    {
        // return all reviews
    }
    public function add_custom (CustomPlanRequest $request)
    {

    }
}
