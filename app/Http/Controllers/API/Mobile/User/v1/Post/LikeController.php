<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;

class LikeController extends BaseController
{
    public function __invoke()
    {
        $like = Like::create([

        ]);
    }
}
