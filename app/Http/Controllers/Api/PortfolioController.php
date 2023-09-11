<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Models\Project;
use App\Traits\GeneralTrait;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    use GeneralTrait;

    public function portfolio (int $id): JsonResponse
    {
        try {
            $selectedProject = Project::with('images')->findOrFail($id);
            $partners = Partner::select('image')->get();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        return $this->returnData('Portfolio page', [
            'selectedProject' => $selectedProject,
            'partners' => $partners,
        ]);
    }
}
