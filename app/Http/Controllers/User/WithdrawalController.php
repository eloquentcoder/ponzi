<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class WithdrawalController extends BaseController
{
    public function index()
    {
        $this->withdrawals = auth()->user()->gethelp;
        return view('user.withdraw.index', $this->data);
    }
}
