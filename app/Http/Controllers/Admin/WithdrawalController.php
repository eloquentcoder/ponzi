<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\ProvideHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class WithdrawalController extends BaseController
{
    public function index()
    {
        return view('admin.withdrawals.index');
    }

    public function personal()
    {
        $this->withdrawals = auth()->user()->gethelp()->paginate(10);
        return view('admin.withdrawals.personal', $this->data);
    }

    public function pending()
    {
        $this->users = User::where('activated', true)
        ->with('GetHelp')->whereHas('GetHelp', function($q) {
            $q->where([['merge_status', 0], ['awaiting_to_receive', 1]]);
        })->paginate(15);
        return view('admin.withdrawals.pending', $this->data);
    }

    public function singleWithdrawals($id)
    {
        $this->providehelp = ProvideHelp::find($id);
        return view('admin.withdrawals.single', $this->data);
    }

}
