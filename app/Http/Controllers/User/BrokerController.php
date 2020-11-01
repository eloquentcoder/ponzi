<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class BrokerController extends BaseController
{
    public function index()
    {
        return view('user.broker.index');
    }

    public function apply(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'is_broker' => 1
        ]);

        return redirect()->back();
    }

}
