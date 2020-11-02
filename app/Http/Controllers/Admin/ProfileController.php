<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function index()
    {
        return view('admin.profile.index');
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
}
