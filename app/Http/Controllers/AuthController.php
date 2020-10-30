<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Password;
use Illuminate\Auth\Events\PasswordReset;
use App\Http\Requests\RegisterUserRequest;

class AuthController extends BaseController
{
    public function loginPage()
    {
        return view('auth.login');
    }

    public function login(LoginRequest $request)
    {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'role' => 'user'])) {
            return redirect()->intended('user/dashboard');
        } else {
            return redirect()->back()->with('error', 'Invalid Credentials, Please Try Again');
        }
    }

    public function registerPage(Request $request)
    {
        if ($request->has('ref')) {
            session(['referrer' => $request->query('ref')]);
        }
        $referrer = User::where('user_name', session()->get('referrer'))->first();
        $this->referrer_name = $referrer->full_name ?? null;
        return view('auth.register', $this->data);
    }

    public function postRegisterPage(RegisterUserRequest $request)
    {
        $referrer = User::where('user_name', session()->pull('referrer'))->first();
        $user = User::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'user_name' => $request->username,
            'password' => bcrypt($request->password),
            'referrer_id' => $referrer ? $referrer->id : null,
            'role' => 'user'
        ]);
        Auth::login($user);
        event(new Registered($user));
        return redirect()->route('dashboard');
    }

    public function forgotPasswordPage()
    {
        return view('auth.forgot-password');
    }

    public function postForgotPassword(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
                ? back()->with(['status' => __($status)])
                : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword()
    {
        return view('auth.reset-password');
    }

    public function postResetPassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function ($user, $password) use ($request) {
                $user->forceFill([
                    'password' => Hash::make($password)
                ])->save();

                $user->setRememberToken(Str::random(60));

                event(new PasswordReset($user));
            }
        );

        return $status == Password::PASSWORD_RESET
                    ? redirect()->route('login')->with('status', __($status))
                    : back()->withErrors(['email' => __($status)]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }


}
