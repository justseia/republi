<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PeopleLoginController extends Controller
{
    public function __invoke(Request $request)
    {
        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'status' => '401',
                'message' => 'Error',
            ], 401);
        }

        $user = User::where('email', $request->email)->first();

        return response()->json([
            'status' => '200',
            'message' => 'Success',
            'access_token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }
}
