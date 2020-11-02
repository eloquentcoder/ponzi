<?php

namespace App\Http\Controllers\Admin;

use App\Models\Support;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class SupportController extends BaseController
{
    public function index()
    {
        $this->supports = Support::paginate(10);
        return view('admin.support.index', $this->data);
    }
}
