<?php

namespace App\Http\Livewire\Admin;

use App\Models\GetHelp;
use Livewire\Component;

class MergedUsers extends Component
{
    public $get_ids;
    public $ids;
    public $provider = false;

    public function mount()
    {
        $this->ids = auth()->user()->providehelp()->where('confirmed', 0)->pluck('get_help_id')->toArray();
        $this->provider = auth()->user()->providehelp()->where('confirmed', 0)->exists();
    }


    public function render()
    {
        return view('livewire.admin.merged-users' , [
            'gethelpers' => GetHelp::whereIn('id', $this->ids)->get()
        ]);
    }
}
