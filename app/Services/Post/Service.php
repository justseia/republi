<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Post;
use App\Models\PostAdditionalData;

class Service
{
    public function store($data)
    {
        $image = $data->file('image');
        $image_name = $image->hashName();
        $image->storeAs('public', $image_name);

        $post = Post::create([
            'title' => $data['title'],
            'body' => $data['body'],
            'user_id' => $data['user_id'],
            'category_id' => $data['category_id'],
        ]);

        $image = new Image;
        $image->url = $image_name;
        $post->images()->save($image);

        foreach ($data['additional_data'] as $item) {
            $image = $item->file('image');
            $image_name = $image->hashName();
            $image->storeAs('public', $image_name);

            $additional_data = new PostAdditionalData;
            $additional_data->title = $item['title'];
            $additional_data->body = $item['body'];
            $additional_data->image = $image_name;
            $additional_data->quote = $item['quote'];
            $post->additional_data()->save($additional_data);
        }
    }

    public function update()
    {

    }
}