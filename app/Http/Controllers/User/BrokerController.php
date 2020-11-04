<?php

namespace App\Http\Controllers\User;

use App\Models\User;
use App\Models\ProvideHelp;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class BrokerController extends BaseController
{
    public function index()
    {
        $this->help = ProvideHelp::where([['confirmed', 1], ['is_activation', 0]])
                            ->where(function($query)
                            {
                                $query->with('User')->whereHas('User', function($q){
                                    $q->where('referrer_id', auth()->user()->id);
                                });
                            })->get();



        return view('user.broker.index', $this->data);
    }

    public function apply(Request $request)
    {
        $user = User::find(auth()->user()->id);

        $user->update([
            'is_broker' => 1
        ]);

        return redirect()->back();
    }

}
