<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use App\Traits\GeneralTrait;

class UserController extends Controller
{
    use GeneralTrait;
    public function profile(string $user_name): JsonResponse
    {
        return $this->returnSuccess('User profile page');
    }

    public function edit(string $user_name): JsonResponse
    {
        return $this->returnSuccess('Edit user profile page');
    }

    public function update(Request $request, string $user_name)
    {
        // update user details
    }

    public function update_picture(Request $request, string $user_name)
    {
        // update user profile picture
    }

    public function delete_pic(string $user_name)
    {
        // update user profile picture
    }

    public function send_review(Request $request, string $user_name)
    {
        // send review
    }

    public function destroy(string $user_name)
    {
        // delete user account
    }
}
