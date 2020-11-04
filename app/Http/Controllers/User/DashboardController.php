<?php

namespace App\Http\Controllers\User;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class DashboardController extends BaseController
{
    public function index()
    {
        $this->transactions = auth()->user()->transactions()->paginate(10);
        $now = Carbon::now();
        $this->gethelp = auth()->user()->gethelp()->where([['received', 0]])->first();
        return view('user.dashboard.index', $this->data);
    }
}
