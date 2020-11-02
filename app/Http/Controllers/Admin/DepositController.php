<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class DepositController extends BaseController
{
    public function index()
    {
        return view('admin.deposit.index');
    }

    public function make()
    {
        return view('admin.deposit.make');
    }

    public function singleInvestment($id)
    {
        $this->id = $id;
        return view('admin.deposit.single', $this->data);
    }

    public function personal()
    {
        $this->investments = auth()->user()->providehelp()->paginate(10);
        return view('admin.deposit.personal', $this->data);
    }


}
