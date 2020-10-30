<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MergeController extends Controller
{
    public function mergeList()
    {
        return view('user.merge.list');
    }
}
