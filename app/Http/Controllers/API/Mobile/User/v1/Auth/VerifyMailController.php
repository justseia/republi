<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Auth;

use App\Http\Controllers\Controller;
use App\Models\MailVerifyCode;
use Illuminate\Http\Request;

class VerifyMailController extends Controller
{
    public function __invoke(Request $request)
    {
        $verify = MailVerifyCode::where('email', $request->email)->first();

        if ($verify->code != (string)$request->code) {
            return response()->json([
                'status' => '400',
                'message' => 'Error'
            ], 400);
        }

        $verify->delete();

        return response()->json([
            'status' => '200',
            'message' => 'Success'
        ], 200);
    }
}
