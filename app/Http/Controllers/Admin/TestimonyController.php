<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Testimonies;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class TestimonyController extends BaseController
{
    public function make()
    {
        return view('admin.testimony.make');
    }

    public function post(Request $request)
    {
        $user = User::find(auth()->user()->id);
        $user->testimonies()->create($request->all());
        return redirect()->route('admin.dashboard')->with('message', 'Testimony Successfully Given');
    }

}
