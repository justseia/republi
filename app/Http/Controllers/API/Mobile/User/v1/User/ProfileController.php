<?php

namespace App\Http\Controllers\API\Mobile\User\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\User\ProfileResource;
use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function __invoke(User $user)
    {
        return new ProfileResource($user);
    }
}
