<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Resources\Mobile\Post\ShowResource;
use App\Models\Post;

class ShowController extends BaseController
{
    public function __invoke($post)
    {
        $post = Post::query()->with(['image', 'user', 'category', 'additional_data', 'comments.user', 'comments.replies.user'])->find($post);

        return new ShowResource($post);
    }
}
