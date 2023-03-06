<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Post;
use App\Models\PostAdditionalData;

class Service
{
    public function store($request)
    {
        $file_image = $request->file('image');
        $image_name = $file_image->hashName();
        $file_image->storeAs('public', $image_name);

        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
        ]);

        $image = new Image;
        $image->url = $image_name;
        $post->images()->save($image);

        if ($request->additional_data) {
            foreach ($request->additional_data as $item) {
                $file_image = $item->file('image');
                $image_name = $file_image->hashName();
                $file_image->storeAs('public', $image_name);

                $additional_data = new PostAdditionalData;
                $additional_data->title = $item['title'];
                $additional_data->body = $item['body'];
                $additional_data->image = $image_name;
                $additional_data->quote = $item['quote'];
                $post->additional_data()->save($additional_data);
            }
        }
    }

    public function update()
    {

    }
}