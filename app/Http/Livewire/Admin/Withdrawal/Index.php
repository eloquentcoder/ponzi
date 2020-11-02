<?php

namespace App\Http\Livewire\Admin\Withdrawal;

use App\Models\GetHelp;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    public function mount()
    {
       dd(GetHelp::get());
    }

    public function render()
    {
        return view('livewire.admin.withdrawal.index', [
            'withdrawals' => GetHelp::paginate(15)
        ]);
    }
}
