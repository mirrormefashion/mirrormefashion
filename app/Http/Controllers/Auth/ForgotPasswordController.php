<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\ResetPassMailManager;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use App\User;
use Illuminate\Support\Facades\Mail;


class ForgotPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset emails and
    | includes a trait which assists in sending these notifications from
    | your application to your users. Feel free to explore this trait.
    |
    */

    use SendsPasswordResetEmails;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Send a reset link to the given user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function sendResetLinkEmail(Request $request)
    {
      
        if (filter_var($request->email, FILTER_VALIDATE_EMAIL)) {
            $user = User::where('email', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();

                if (env('MAIL_USERNAME') != null) {
                    $array['view'] = 'emails.resetpassword';
                    $array['subject'] = 'Password Recovery.';
                    $array['from'] = env('MAIL_FROM_ADDRESS');
                    $array['email']=$user->email;
                    $array['code']= $user->verification_code;
    
                    try {
                        Mail::to($user->email)->queue(new ResetPassMailManager($array));
                    } catch (\Exception $e) {
                    }
                }
                flash(translate('We have emailed your password recovery link'))->success();
                return back();
            }
            else {
                flash(translate('No account exists with this email'))->error();
                return back();
            }
        }
        else{
            $user = User::where('phone', $request->email)->first();
            if ($user != null) {
                $user->verification_code = rand(100000,999999);
                $user->save();
                sendSMS($user->phone, env('APP_NAME'), $user->verification_code.translate(' is your verification code'));
                return view('otp_systems.frontend.auth.passwords.reset_with_phone');
            }
            else {
                flash(translate('No account exists with this phone number'))->error();
                return back();
            }
        }
    }
}
