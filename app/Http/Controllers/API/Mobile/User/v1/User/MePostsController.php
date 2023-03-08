<?php

namespace App\Http\Controllers\API\Mobile\User\v1\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\Post\IndexResource;
use App\Models\Post;
use Illuminate\Http\Request;

class MePostsController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $posts = Post::with(['images', 'user', 'category', 'comments', 'like'])->where('user_id', $user->id)->simplePaginate(50);
        return IndexResource::collection($posts);
    }
}
