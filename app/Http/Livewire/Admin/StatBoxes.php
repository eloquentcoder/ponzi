<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;

class StatBoxes extends Component
{
    public function render()
    {
        return view('livewire.admin.stat-boxes', [
            'total_investment' => ProvideHelp::sum('amount'),
            'total_withdrawals' => GetHelp::sum('amount'),
            'total_investors' => User::where('role', 'user')->count(),
            'total_brokers' => User::where('is_broker', 1)->count(),
            'personal_investment' => auth()->user()->providehelp()->where('confirmed', 1)->sum('amount'),
            'personal_withdrawals' => auth()->user()->gethelp()->where('received', 1)->sum('amount'),
        ]);
    }
}
