<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Requests\Mobile\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);

        return response()->json([
            'status' => '200',
            'message' => 'Successfully created'
        ], 200);
    }
}
