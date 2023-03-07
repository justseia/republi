<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\PostAdditionalData;
use Illuminate\Http\Request;

class StoreAdditionalController extends Controller
{
    public function __invoke(Post $post, Request $request)
    {
        if ($request->file('image')) {
            $image = $request->file('image');
            $image_name = $image->hashName();
            $image->storeAs('public', $image_name);
        }

        $additional_data = new PostAdditionalData;
        $additional_data->title = $request->title;
        $additional_data->body = $request->body;
        $additional_data->image = $image_name;
        $additional_data->quote = $request->quote;
        $post->additional_data()->save($additional_data);

        return response()->json([
            'status' => '200',
            'message' => 'Success'
        ], 200);
    }
}
