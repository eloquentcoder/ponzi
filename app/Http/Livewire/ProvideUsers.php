<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProvideUsers extends Component
{
    public $get_ids;

    public function mount()
    {
        $this->mergeStatus();
    }

    protected function mergeStatus()
    {
        $this->get_ids = auth()->user()->gethelp()->where('merge_status', 1)->pluck('id')->toArray();
        // dd($this->get_ids);
    }


    public function render()
    {
        $prov_ids = DB::table('get_provide')->whereIn('get_help_id', $this->get_ids ?? [])->pluck('provide_help_id')->toArray();
        return view('livewire.provide-users', [
            'provide' => ProvideHelp::where('confirmed', 0)->whereDate('expiration_date', '<=', now())->whereIn('id', $prov_ids ?? [])->get()
        ]);
    }
}
