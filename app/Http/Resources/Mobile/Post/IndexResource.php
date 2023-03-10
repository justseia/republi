<?php

namespace App\Http\Resources\Mobile\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class IndexResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'title' => $this->title,
            'body' => $this->body,
            'user' => new UserResource($this->user_post),
            'category' => $this->category->name,
            'images' => $this->images,
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'is_like' => $this->has_liked,
            'total_likes' => $this->likers->count(),
            'total_views' => $this->views,
            'total_comments' => $this->comments->count() + $this->comments->sum(fn($comment) => $comment->replies->count()),
        ];
    }
}
