<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use App\Traits\GeneralTrait;
use App\Models\Review;
use App\Models\Project;
use App\Models\Service;
use App\Models\partner;
use App\Models\Faq;

class HomeController extends Controller
{
    use GeneralTrait;

    public function index(): JsonResponse
    {
        try {
            $recentProjects = Project::select('image')->where('recent', 1)->get();
            $lastProjects = Project::count() <= 4 ? Project::get() : Project::latest()->take(4)->get();
            $services = Service::withCount('projects')->get();
            $topReview = Review::where('top', 1)->first();
            $reviews = Review::where('public', 1)->get();
            $partners = Partner::select('image')->get();
            $faqs = Faq::get();
        } catch (\Exception $e) {
            return $this->returnError($e->getCode(), $e->getMessage());
        }
        return $this->returnData('Home page', [
            'topReview' => $topReview,
            'recentProjects' => $recentProjects,
            'services' => $services,
            'lastProjects' => $lastProjects,
            'faqs' => $faqs,
            'partners' => $partners,
            'reviews' => $reviews
        ]);
    }
}
