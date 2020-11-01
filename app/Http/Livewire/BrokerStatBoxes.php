<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BrokerStatBoxes extends Component
{
    public function render()
    {
        return view('livewire.broker-stat-boxes', [
            'referral_bonus' => auth()->user()->value('referral_bonus'),
            'referrals' => auth()->user()->referrals()->count(),
            'brokers' => User::where([['activated', 1], ['referrer_id', auth()->user()->id]])->count()
        ]);
    }
}
