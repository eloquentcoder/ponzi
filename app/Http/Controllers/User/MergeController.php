<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class MergeController extends BaseController
{
    public function mergeList()
    {
        $this->gethelp = auth()->user()->gethelp()->where([['received', 0]])->first();
        return view('user.merge.list', $this->data);
    }
}
