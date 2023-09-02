<?php

use App\Http\Controllers\Api\AboutController;
use App\Http\Controllers\Api\Auth\RestoreController;
use App\Http\Controllers\Api\Auth\SignInController;
use App\Http\Controllers\Api\Auth\LogoutController;
use App\Http\Controllers\Api\Auth\SignUpController;
use App\Http\Controllers\Api\Auth\UpdatePasswordController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\ContactController;
use App\Http\Controllers\Api\PortfolioController;
use App\Http\Controllers\Api\PricingController;
use App\Http\Controllers\Api\ServicesController;
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
Route::middleware('checkPassword')->group(function () {
    // Site Apis
    Route::namespace('Api')->group(function () {
        //
        // Site Apis
        //
        // Home Page
        Route::get('/', [HomeController::class, 'index']);
        // About Page
        Route::get('about_us', [AboutController::class, 'about']);
        // Services Page
        Route::get('services', [ServicesController::class, 'services']);
        // Portfolio Page
        Route::get('portfolio', [PortfolioController::class, 'portfolio']);
        //
        // Auth Apis
        //
        // Sign Up
        Route::get('sign_up', [SignUpController::class, 'sign_up']);
        Route::post('sign_up', [SignUpController::class, 'store_details']);
        // Sign In
        Route::get('sign_in', [SignInController::class, 'sign_in'])->name('sign_in');
        Route::post('sign_in', [SignInController::class, 'check_credentials']);
        // Restore
        Route::get('restore', [RestoreController::class, 'restore']);
        Route::post('restore', [RestoreController::class, 'send_email_code']);
        // Verification
        Route::get('verification', [RestoreController::class, 'verification']);
        Route::post('verification', [RestoreController::class, 'check_code']);
        // Update Password
        Route::get('update_password', [UpdatePasswordController::class, 'update_password']);
        Route::put('update_password', [UpdatePasswordController::class, 'confirm_password']);
        // Logout
        Route::post('logout', [LogoutController::class, 'logout'])->middleware('auth:api');
        //
        // Contact Apis
        //
        // Contact Page
        Route::get('contact_us', [ContactController::class, 'contact']);
        // Feedback
        Route::post('feedback', [ContactController::class, 'feedback']);
        // Call Request
        Route::post('call_request', [ContactController::class, 'call_request']);
        //
        // Pricing Apis
        //
        // Pricing Page
        Route::get('pricing', [PricingController::class, 'pricing']);
        // Custom Plan
        Route::post('custom_plan', [PricingController::class, 'custom_plan'])->middleware('auth:api');
        //
        // User Apis
        //
        Route::group(['prefix' => 'user', 'middleware' => 'auth:api'], function () {
            Route::prefix('profile')->group(function () {
                // Profile Page
                Route::get('/{user_name}', [UserController::class, 'profile']);
                // Edit Profile Page
                Route::get('edit/{user_name}', [UserController::class, 'edit']);
                // Update Profile
                Route::put('update/{user_name}', [UserController::class, 'update']);
                Route::put('update_pic/{user_name}', [UserController::class, 'update_picture']);
                Route::put('delete_pic/{user_name}', [UserController::class, 'delete_pic']);
                // Destroy Account
                Route::delete('destroy/{user_name}', [UserController::class, 'destroy']);
            });
            // Send Review
            Route::post('send_review/{user_name}', [UserController::class, 'send_review']);
        });
    });
});
