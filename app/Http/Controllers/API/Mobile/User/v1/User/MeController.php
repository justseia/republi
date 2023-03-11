<?php

namespace App\Http\Controllers\API\Mobile\User\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\User\MeResource;
use App\Models\Post;
use Illuminate\Http\Request;

class MeController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();

        return new MeResource($user);
    }
}
