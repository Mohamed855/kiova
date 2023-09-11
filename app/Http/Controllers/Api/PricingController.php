<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Plan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class PricingController extends Controller
{
    use GeneralTrait;
    public function pricing(): JsonResponse
    {
        try {
            $plans = Plan::with([
                'planServices'=> function($query) {
                $query->withPivot('status');
            }])->get();
            $partners = Partner::select('image')->get();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        return $this->returnData('Pricing page', [
            'plans' => $plans,
            'partners' => $partners,
        ]);
    }

    public function custom_plan(Request $request)
    {

    }
}
