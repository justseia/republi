<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Post;

use App\Http\Requests\Mobile\Post\StoreRequest;

class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $request->validated();

        $post = $this->service->store($request);

        return response()->json([
            'status' => '200',
            'message' => 'Successfully created',
            'data' => [
                'post_id' => $post->id
            ],
        ], 200);
    }
}
