<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\Post\IndexResource;
use App\Models\Post;

class AllFavoriteController extends Controller
{
    public function __invoke()
    {
        $favorite_posts = auth()->user()->getFavoriteItems(Post::class)->get();

        return IndexResource::collection($favorite_posts);
    }
}
