<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\Vacancy\IndexResource;
use App\Models\Post;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class AllFavoriteController extends Controller
{
    public function __invoke()
    {
        $favorite_posts = auth()->user()->getFavoriteItems(Vacancy::class)->get();

        return IndexResource::collection($favorite_posts);
    }
}
