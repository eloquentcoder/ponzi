<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\Testimonies;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class TestimonyController extends BaseController
{
    public function make()
    {
        return view('user.testimony.make');
    }

    public function post(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->testimonies()->create($request->all());
        return redirect()->route('dashboard')->with('message', 'Testimony Successfully Given');
    }

}
