<?php

namespace App\Http\Controllers\API\Mobile\User\v1\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UnfollowContoller extends Controller
{
    public function __invoke(User $user)
    {
        auth()->user()->unfollow($user);

        return response()->json([
            'status' => '200',
            'message' => 'Success'
        ], 200);
    }
}
