<?php

namespace App\Services\Post;

use App\Models\Image;
use App\Models\Post;

class Service
{
    public function store($request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body,
            'user_id' => auth()->user()->id,
            'category_id' => $request->category_id,
        ]);

        $image = $request->file('image');
        $image_name = $image->hashName();
        $image->storeAs('public', $image_name);

        $image = new Image;
        $image->url = $image_name;
        $post->images()->save($image);

        return $post;
    }

    public function update()
    {

    }
}