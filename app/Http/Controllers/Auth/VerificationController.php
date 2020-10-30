<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class VerificationController extends Controller
{
    public function verificationNotice()
    {
        return view('auth.verify-email');
    }

    public function hashEmailVerification(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect('/user/dashboard');
    }

    public function verificationNotification(Request $request)
    {
        $request->user()->sendEmailVerificationNotification();
        return back()->with('status', 'verification-link-sent');
    }

}
