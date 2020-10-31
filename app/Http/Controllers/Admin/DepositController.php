<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositController extends Controller
{
    public function index()
    {
        return view('admin.deposit.index');
    }

    public function make()
    {
        return view('admin.deposit.make');
    }

}
