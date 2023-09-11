<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Service;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;

class ServicesController extends Controller
{
    use GeneralTrait;

    public function services (int $id): JsonResponse
    {
        try {
            $selectedService = Service::with('images')->findOrFail($id);
            $partners = Partner::select('image')->get();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        return $this->returnData('Services page', [
            'selectedService' => $selectedService,
            'partners' => $partners,
        ]);
    }
}
