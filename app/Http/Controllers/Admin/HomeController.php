<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\GetHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\BaseController;

class HomeController extends BaseController
{
    public function index()
    {
        $now = Carbon::now();
        $this->gethelp = auth()->user()->gethelp()->where('merge_status', 0)->whereDate('maturity_period', '>=', $now)->first();
        return view('admin.dashboard.index', $this->data);
    }

    public function admins(Type $var = null)
    {
        $this->admins = User::where('role', 'admin')->with('gethelp')->paginate(15);
        return view('admin.admins.index', $this->data);
    }

    public function adminsPost(Request $request, $id)
    {
        $now = Carbon::now();
        $amount = [50000, 100000, 200000, 500000];
        $i = rand(0, 3);
        GetHelp::create([
            'amount' => $amount[$i] + ($amount[$i]*0.5) ,
            'user_id' => $id,
            'awaiting_to_receive' => 1,
            'maturity_period' => $now
        ]);

        return redirect()->back()->with('message', 'Withdrawal Request Made Successfully');
    }


    public function logout()
    {
        Auth::logout();
        return redirect()->route('admin.login');
    }

    public function users()
    {
        $this->users = User::where('role', 'admin')->paginate(15);
        return view('admin.users.index');
    }

}
