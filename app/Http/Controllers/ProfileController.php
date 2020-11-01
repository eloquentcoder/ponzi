<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\BaseController;
use Illuminate\Support\Facades\Validator;

class ProfileController extends BaseController
{

    public function index()
    {
        return view('user.profile.index');
    }

    public function post(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update($request->all());
        return redirect()->back()->with('message', 'Profile Updated Successfully');
    }

    public function password(Request $request)
    {
        if (!Hash::check($request->old_password, auth()->user()->password)) {
            return redirect()->back()->with('error', 'Password is incorrect');
        }

        $validator = Validator::make($request->all(), [
            'password' => 'confirmed'
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withInput()->with('errors', $validator->errors());
        }

        $user = User::find(auth()->user()->id);
        $user->update([
            'password' => bcrypt($request->password)
        ]);

        return redirect()->back()->with('message_password', 'Password changed successfully');

    }

    public function profilePage()
    {
        $this->banks = Bank::all();
        return view('user.profile.auth', $this->data);
    }

    public function postProfile(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->update([
            'account_details' => $request->account_details,
            'bank_name' => $request->bank_name,
            'account_name' => $request->account_name
        ]);
        return redirect()->route('dashboard');
    }
}
