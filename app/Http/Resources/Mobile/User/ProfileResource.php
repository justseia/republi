<?php

namespace App\Http\Resources\Mobile\User;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProfileResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'image' => $this->image,
            'username' => $this->username,
            'scope' => 'Designer & Videographer',
            'total_post' => $this->posts->count(),
            'total_followers' => '2600542',
            'total_follows' => '648',
            'total_likes' => '444',
        ];
    }
}
