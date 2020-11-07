<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\GHTransaction;

class MergedUsers extends Component
{
    public $get_ids;
    public $ids;
    public $provider = false;

    public function mount()
    {
        $this->ids = auth()->user()->phtransactions()->where('confirmed', 0)->pluck('provide_help_id')->toArray();
        $this->provider = auth()->user()->phtransactions()->where('confirmed', 0)->exists();
    }


    public function render()
    {
        $gh = ProvideHelp::whereIn('id', $this->ids)->pluck('get_help_id')->toArray();
        return view('livewire.merged-users', [
            'gethelpers' => GHTransaction::whereIn('get_help_id', $gh)->get()
        ]);
    }
}
