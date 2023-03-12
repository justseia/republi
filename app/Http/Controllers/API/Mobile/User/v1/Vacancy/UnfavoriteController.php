<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class UnfavoriteController extends Controller
{
    public function __invoke(Vacancy $vacancy)
    {
        auth()->user()->unfavorite($vacancy);

        return response()->json([
            'status' => '200',
            'message' => 'Unfavorite'
        ], 200);
    }
}
