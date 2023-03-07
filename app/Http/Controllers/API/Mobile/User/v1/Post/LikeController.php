<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class LikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        $like = new Like;
        $like->user_id = auth()->user()->id;
        $post->like()->save($like);

        return response()->json([
            'status' => '200',
            'message' => 'Like'
        ], 200);
    }
}
