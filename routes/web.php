<?php

use App\Http\Controllers\Admin\Auth\SignInController;
use App\Http\Controllers\Admin\UserResetPasswordController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect()->route('admin.sign_in');
});

// User reset password
Route::get('password/reset/{token}', [UserResetPasswordController::class, 'showResetForm'])->name('password.reset'); // done
Route::put('password/reset', [UserResetPasswordController::class, 'reset'])->name('password.update'); // done

Route::prefix('admin')->group(function (){
    Route::get('sign_in', [SignInController::class, 'sign_in'])->name('admin.sign_in');
    Route::middleware('admin_auth')->group(function () {
        // all dashboard routes
    });
});
