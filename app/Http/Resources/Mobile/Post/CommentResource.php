<?php

namespace App\Http\Resources\Mobile\Post;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CommentResource extends JsonResource
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
            'body' => $this->body,
            'total_likes' => $this->like,
            'created_at' => $this->created_at->diffForHumans(now(), true),
            'user' => new CommentUserResource($this->user),
            'replies' => ReplyResource::collection($this->replies),
        ];
    }
}
