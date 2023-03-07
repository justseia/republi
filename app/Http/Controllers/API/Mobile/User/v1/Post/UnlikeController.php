<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Like;
use App\Models\Post;
use Illuminate\Http\Request;

class UnlikeController extends BaseController
{
    public function __invoke(Post $post)
    {
        $post->like()->delete();

        return response()->json([
            'status' => '200',
            'message' => 'Unlike'
        ], 200);
    }
}
