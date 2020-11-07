<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class DepositController extends BaseController
{

    public function index()
    {
        // $this->investments = auth()->user()->providehelp;
        return view('user.invest.index', $this->data);
    }

    public function makeDepositPage()
    {
        return view('user.invest.make');
    }

    public function singleInvestment($id)
    {
        $this->id = $id;
        return view('user.invest.single', $this->data);
    }

}
