<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    use GeneralTrait;

    public function about(): JsonResponse
    {
        try {
            $services = Service::select('name', 'icon', 'short_description')->get();
            $partners = Partner::select('image')->get();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        return $this->returnData('About page', [
            'services' => $services,
            'partners' => $partners,
        ]);
    }
}
