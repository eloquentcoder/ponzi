<?php

namespace App\Http\Controllers;

use App\Models\Bank;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ProfileController extends BaseController
{
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
