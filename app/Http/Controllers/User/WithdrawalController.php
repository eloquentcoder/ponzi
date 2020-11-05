<?php

namespace App\Http\Controllers\User;

use App\Models\GetHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class WithdrawalController extends BaseController
{
    public function index()
    {
        $this->withdrawals = GetHelp::with('providehelp')->where('user_id', auth()->user()->id)->get();
        return view('user.withdraw.index', $this->data);
    }
}
