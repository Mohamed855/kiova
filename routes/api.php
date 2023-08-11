<?php

use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\ComponentController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PlanController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Api check password
Route::middleware('checkPassword')->group( function () {
    // Site components apis
    Route::controller(ComponentController::class)->group(function () {
        Route::get('services', 'get_services');
        Route::get('projects', 'get_projects');
        Route::get('faqs', 'get_faqs');
        Route::get('partners', 'get_partners');
        Route::get('reviews', 'get_reviews');
    });

    // Contact apis
    Route::controller(ContactController::class)->group(function () {
        Route::post('send_call_request', 'send_call_request');
        Route::post('send_message', 'send_message');
    });

    // Auth apis
    Route::controller(AuthController::class)->group(function (){
        Route::post('register', 'register');
        Route::post('login', 'login');
        Route::post('logout', 'logout') -> middleware('auth:api');
        Route::post('refresh', 'refresh') -> middleware('auth:api');
    });


    // Pricing apis
    Route::group(['prefix' => 'pricing'], function () {
        Route::controller(PlanController::class)->group(function () {
            Route::get('plans', 'get_plans');
            Route::get('plan_services', 'get_plan_services');
            Route::post('custom_plan', 'add_custom') -> middleware('auth:api');
        });
    });

    // Apis controls user account
    Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
        Route::controller(UserController::class)->group(function () {
            Route::get('profile/{id}', 'profile');
            Route::get('edit/{id}', 'edit');
            Route::post('update/{id}', 'update');
            Route::post('update_profile_pic/{id}', 'update_profile_picture');
            Route::post('send_review/{id}', 'send_review');
            Route::delete('delete/{id}', 'destroy');
        });
    });
});
