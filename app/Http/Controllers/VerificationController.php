<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verifyy(Request $request) {
        $user_id=$request->id;
        $code=$request->code;
        $user = User::findOrFail($user_id);

        if (!$user->hasVerifiedEmail()) {
            if ($user->email_code==$code) {
                $user->markEmailAsVerified();
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Email Verified',


                ]);

            }
            else{
                return response([
                    'status' =>true,

                    'token' =>true,

                    'uid' =>$user_id,

                    'message'=>'Email Not Verified',


                ]);
            }

        }
        else{
            return response([
                'status' =>true,

                'token' =>true,

                'uid' =>$user_id,

                'message'=>'Email Already Verified',


            ]);


        }


    }

    // public function resend() {
    //     if (auth()->user()->hasVerifiedEmail()) {
    //         return response()->json(["msg" => "Email already verified."], 400);
    //     }

    //     auth()->user()->sendEmailVerificationNotification();

    //     return response()->json(["msg" => "Email verification link sent on your email id"]);
    // }
}
