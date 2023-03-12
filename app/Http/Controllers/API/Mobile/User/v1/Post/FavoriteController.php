<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class FavoriteController extends Controller
{
    public function __invoke(Post $post)
    {
        auth()->user()->favorite($post);

        return response()->json([
            'status' => '200',
            'message' => 'Favorite'
        ], 200);
    }
}
