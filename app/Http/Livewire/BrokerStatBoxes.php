<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;

class BrokerStatBoxes extends Component
{
    public function mount()
    {
        // dd(User::where('id',auth()->user()->id)->select('referral_bonus'));
    }

    public function render()
    {
        return view('livewire.broker-stat-boxes', [
            'referral_bonus' => auth()->user()->referral_bonus,
            'referrals' => auth()->user()->referrals()->count(),
            'brokers' => User::where([['activated', 1], ['referrer_id', auth()->user()->id]])->count()
        ]);
    }
}
