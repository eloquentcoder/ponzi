<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        # code...
    }

}
