<?php

use App\Http\Controllers\Api\Auth\RestoreController;
use App\Http\Controllers\Api\Auth\SignInController;
use App\Http\Controllers\Api\Auth\SignOutController;
use App\Http\Controllers\Api\Auth\SignUpController;
use App\Http\Controllers\Api\HomeController;
use App\Http\Controllers\Api\AboutController;
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
    //
    // Site Apis
    //
    // Home Page
    Route::get('/', [HomeController::class, 'index']); // done
    // About Page
    Route::get('about_us', [AboutController::class, 'about']); // done
    // Services Page
    Route::get('services/{id}', [ServicesController::class, 'services']); // done
    // Portfolio Page
    Route::get('portfolio/{id}', [PortfolioController::class, 'portfolio']); // done
    //
    // Auth Apis
    //
    // Sign Up
    Route::get('sign_up', [SignUpController::class, 'sign_up']); // done
    Route::post('sign_up', [SignUpController::class, 'store_details']); // done
    // Sign In
    Route::get('sign_in', [SignInController::class, 'sign_in'])->name('sign_in'); // done
    Route::post('sign_in', [SignInController::class, 'check_credentials']); // done
    // Restore
    Route::get('restore', [RestoreController::class, 'restore']); // done
    Route::post('restore', [RestoreController::class, 'send_email_code']); // done
    // Logout
    Route::post('sign_out', [SignOutController::class, 'sign_out'])->middleware('auth.guard:api'); // done
    //
    // Contact Apis
    //
    // Contact Page
    Route::get('contact_us', [ContactController::class, 'contact']); // done
    // Feedback
    Route::post('feedback', [ContactController::class, 'feedback']); // done
    // Call Request
    Route::post('call_request', [ContactController::class, 'call_request']); // done
    //
    // Pricing Apis
    //
    // Pricing Page
    Route::get('pricing', [PricingController::class, 'pricing']); // done
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
