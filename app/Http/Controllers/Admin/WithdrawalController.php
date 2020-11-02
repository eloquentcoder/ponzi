<?php

namespace App\Http\Controllers\Admin;

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

}
