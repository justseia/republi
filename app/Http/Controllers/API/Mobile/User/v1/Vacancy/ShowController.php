<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\Vacancy\ShowResource;
use App\Models\Vacancy;

class ShowController extends Controller
{
    public function __invoke(Vacancy $vacancy)
    {
//        $vacancy = Vacancy::find($vacancy);
//
//        if (!$vacancy) {
//            return response()->json([
//                'status' => '404',
//                'message' => 'Not found'
//            ], 404);
//        }

        return new ShowResource($vacancy);
    }
}
