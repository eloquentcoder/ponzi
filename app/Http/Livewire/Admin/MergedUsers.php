<?php

namespace App\Http\Livewire\Admin;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\GHTransaction;

class MergedUsers extends Component
{
    public $get_ids;
    public $ids;
    public $provider = false;

    public function mount()
    {
        $this->ids = auth()->user()->providehelp()->pluck('get_help_id')->toArray();
        $this->provider = auth()->user()->providehelp()->exists();
    }


    public function render()
    {
        return view('livewire.admin.merged-users' , [
            'gethelpers' => GHTransaction::whereIn('id', $this->ids)->get()
        ]);
    }
}
