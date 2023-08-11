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
    public function profile(string $id)
    {
        // show user profile page
    }

    public function edit(string $id)
    {
        // show user edit details page
    }

    public function update(UpdateDetailsRequest $request, string $id)
    {
        // update user details
    }

    public function update_profile_picture(ProfilePictureRequest $request, string $id)
    {
        // update user profile picture
    }

    public function send_review(ReviewRequest $request, string $id)
    {
        // send review
    }

    public function destroy(string $id)
    {
        // delete user account
    }
}
