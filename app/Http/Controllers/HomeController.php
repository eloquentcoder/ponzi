<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Support;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function indexPage()
    {
        $this->investors = User::count();
        $this->brokers = User::where('is_broker', 1)->count();
        $this->transactions = Transaction::count();
        return view('home.index', $this->data);
    }

    public function contactPage()
    {
        return view('home.contact');
    }

    public function postContact(Request $request)
    {
        $support = Support::create($request->all());
        return redirect()->back()->with('message', 'Message Sent Successfully');
    }

    public function restricted()
    {
        return view('user.restricted.index');
    }

}
