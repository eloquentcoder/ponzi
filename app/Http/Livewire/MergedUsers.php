<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\GHTransaction;
use Illuminate\Support\Facades\DB;

class MergedUsers extends Component
{
    public $get_ids;
    public $ids;
    public $provider = false;

    public function mount()
    {
        $this->ids = auth()->user()->providehelp()->where('confirmed', 0)->pluck('id')->toArray();
        $this->provider = auth()->user()->providehelp()->where('confirmed', 0)->exists();
    }


    public function render()
    {
        $gh = DB::table('get_provide')->whereIn('provide_help_id', $this->ids)->pluck('get_help_id')->toArray();
        return view('livewire.merged-users', [
            'gethelpers' => GetHelp::whereIn('id', $gh)->get()
        ]);
    }
}
