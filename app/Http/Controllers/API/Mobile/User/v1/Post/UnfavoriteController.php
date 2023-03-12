<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class UnfavoriteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->unfavorite($post);

        return response()->json([
            'status' => '200',
            'message' => 'Unfavorite'
        ], 200);
    }
}
