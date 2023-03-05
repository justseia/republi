<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Resources\Mobile\Post\IndexResource;
use App\Models\Post;

class IndexController extends BaseController
{
    public function __invoke()
    {
        $posts = Post::with(['images', 'user', 'category', 'comments'])->orderBy('id', 'DESC')->simplePaginate(50);

        return IndexResource::collection($posts);
    }
}
