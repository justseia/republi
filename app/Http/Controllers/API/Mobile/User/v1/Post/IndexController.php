<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Resources\Mobile\Post\IndexResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::latest('id')->with(['images', 'user_post', 'category', 'comments', 'likers'])->simplePaginate(50);

        $posts = auth()->user()->attachLikeStatus($posts);

        return IndexResource::collection($posts);
    }
}
