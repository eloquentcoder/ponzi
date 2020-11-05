<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Controllers\BaseController;

class ReferralController extends BaseController
{
    public function index()
    {
        $this->referrals = auth()->user()->referrals;
        return view('user.referral.index', $this->data);
    }

    public function withdraw()
    {
        $referral_bonus = User::find(auth()->user()->id)->referral_bonus;
        return view('user.referral.withdraw', $this->data);
    }

}
