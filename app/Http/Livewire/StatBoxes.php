<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Services\MergeServices;

class StatBoxes extends Component
{
    public function mount()
    {
        // $now = Carbon::now();
        // $getters = GetHelp::where([['merge_status', 0], ['awaiting_to_receive', 1]])->whereDate('maturity_period', '>=', $now)->chunk(100, function($getters) {
        //     foreach ($getters as $value) {
        //         MergeServices::mergeGetters($value);
        //     }
        // });
    }

    public function render()
    {
        return view('livewire.stat-boxes', [
            'total_investment' => auth()->user()->providehelp()->where('confirmed', 1)->sum('amount'),
            'total_withdrawals' => auth()->user()->gethelp()->where('received', 1)->sum('amount'),
            'referral_bonus' => auth()->user()->referral_bonus,
            'referrals' => auth()->user()->referrals()->count()
        ]);
    }
}
