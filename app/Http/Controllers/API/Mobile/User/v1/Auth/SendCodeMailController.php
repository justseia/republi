<?php

namespace App\Http\Controllers\API\Mobile\User\v1\Auth;

use App\Http\Controllers\Controller;
use App\Mail\VerifyMail;
use App\Models\MailVerifyCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class SendCodeMailController extends Controller
{
    public function __invoke(Request $request)
    {
        $email_verify = MailVerifyCode::where('email', $request->email)->first();
        $code = mt_rand(1000, 9999);

        if ($email_verify) {
            $email_verify->update(['email' => $request->email, 'code' => $code]);

            return response()->json([
                'status' => '200',
                'message' => 'Resend'
            ]);
        }

        $email_verify = MailVerifyCode::create([
            'email' => $request->email,
            'code' => $code
        ]);

        Mail::to($email_verify->email)->send(new VerifyMail($email_verify->code));

        return response()->json([
            'status' => '200',
            'message' => 'Send verify'
        ]);
    }
}
