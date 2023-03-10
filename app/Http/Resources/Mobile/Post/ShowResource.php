<?php

namespace App\Http\Resources\Mobile\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ShowResource extends JsonResource
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
            'image' => $this->image,
            'additional_data' => AdditionalDataResource::collection($this->additional_data),
            'user' => new UserResource($this->user_post),
            'category' => $this->category->name,
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'total_likes' => $this->likes,
            'total_views' => $this->views,
            'total_comments' => $this->comments->count() + $this->comments->sum(fn($comment) => $comment->replies->count()),
            'comments' => CommentResource::collection($this->comments),
        ];
    }
}
