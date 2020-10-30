<?php

namespace App\Http\Livewire;

use Livewire\Component;

class StatBoxes extends Component
{
    public function render()
    {
        return view('livewire.stat-boxes', [
            'total_investment' => auth()->user()->transactions()->where('type', 'provide_help')->sum('amount'),
            'total_withdrawals' => auth()->user()->transactions()->where('type', 'get_help')->sum('amount'),
            'referral_bonus' => auth()->user()->value('referral_bonus'),
            'referrals' => auth()->user()->referrals()->count()
        ]);
    }
}
