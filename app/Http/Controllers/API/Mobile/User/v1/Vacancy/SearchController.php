<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Vacancy;

use App\Http\Controllers\Controller;
use App\Http\Resources\Mobile\Vacancy\IndexResource;
use App\Models\Vacancy;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $search = $request['search'];
        $vacancy = Vacancy::latest('id')->where('position', 'LIKE', '%' . $search . '%')->with(['city.country', 'company'])->simplePaginate(50);

        return IndexResource::collection($vacancy);
    }
}
