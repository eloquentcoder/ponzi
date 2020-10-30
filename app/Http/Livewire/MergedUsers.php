<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;

class MergedUsers extends Component
{
    public $get_ids;
    public $ids;

    public function mount()
    {
        $this->ids = auth()->user()->providehelp()->where('confirmed', 0)->pluck('get_help_id')->toArray();
    }


    public function render()
    {
        return view('livewire.merged-users', [
            'gethelpers' => GetHelp::whereIn('id', $this->ids)->get()
        ]);
    }
}
