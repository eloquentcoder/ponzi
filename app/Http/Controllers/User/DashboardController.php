<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $this->transactions = auth()->user()->transactions()->paginate(10);
        return view('user.dashboard.index', $this->data);
    }
}
