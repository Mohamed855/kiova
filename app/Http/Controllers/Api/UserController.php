<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\ProfilePictureRequest;
use App\Http\Requests\Api\ReviewRequest;
use App\Http\Requests\Api\UpdateDetailsRequest;
use App\Traits\GeneralTrait;

class UserController extends Controller
{
    use GeneralTrait;
    public function profile(string $user_name)
    {
        // show user profile page
    }

    public function edit(string $user_name)
    {
        // show user edit details page
    }

    public function update(UpdateDetailsRequest $request, string $user_name)
    {
        // update user details
    }

    public function update_picture(ProfilePictureRequest $request, string $user_name)
    {
        // update user profile picture
    }

    public function delete_pic(string $user_name)
    {
        // update user profile picture
    }

    public function send_review(ReviewRequest $request, string $user_name)
    {
        // send review
    }

    public function destroy(string $user_name)
    {
        // delete user account
    }
}
