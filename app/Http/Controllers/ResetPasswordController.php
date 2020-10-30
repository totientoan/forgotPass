<?php

namespace App\Http\Controllers;

use App\Models\PasswordReset;
use Illuminate\Support\Str;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Http\Request;

class ResetPasswordController extends Controller
{
    //
    /**
     * Create token password reset.
     *
     * @param  ResetPasswordRequest $request
     * @return JsonResponse
     */
    public function sendMail(Request $request)
    {
        $user = User::where('email', $request->email)->firstOrFail();
        $passwordReset = PasswordReset::updateOrCreate([
            'email' => $user->email,
        ], [
            'token' => Str::random(60),
        ]);
        if ($passwordReset) {
            $user->notify(new ResetPassword($passwordReset->token));
        }
  
        return response()->json([
        'message' => 'We have e-mailed your password reset link!'
        ]);
    }

    public function reset(Request $request, $token)
    {
        $passwordReset = PasswordReset::where('token', $token)->firstOrFail();
        if (Carbon::parse($passwordReset->updated_at)->addMinutes(720)->isPast()) {
            $passwordReset->delete();

            return response()->json([
                'message' => 'This password reset token is invalid.',
            ], 422);
        }
        $user = User::where('email', $passwordReset->email)->firstOrFail();
        $updatePasswordUser = $user->update($request->only('password'));
        $passwordReset->delete();

        return response()->json([
            'success' => $updatePasswordUser,
        ]);
    }

    // public function getForgotPassword(Request $request)
    // {
    // 	//Tạo token và gửi đường link reset vào email nếu email tồn tại
    // 	$result = User::where('email', $request->email)->first();
    // 	if($result){
    // 		$resetPassword = ResetPassword::firstOrCreate(['email'=>$request->email, 'token'=>Str::random(60)]);

    // 		$token = ResetPassword::where('email', $request->email)->first();
    // 		echo $link = url('resetPassword')."/".$token->token; //send it to email
    // 	} else {
    // 		echo 'Email không có trong hệ thống, vui lòng kiểm tra lại';
    // 	}
    	
    // }
}
