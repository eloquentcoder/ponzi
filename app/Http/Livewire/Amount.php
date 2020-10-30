<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use Livewire\Component;

class Amount extends Component
{
    public $is_mature = false;
    public $gethelp;
    public $percent;

    public function mount()
    {
        $now = Carbon::now();
        $this->gethelp = auth()->user()->gethelp()->where(['merge_status', 0])->whereDate('maturity_period', '>=', $now)->first();
        $this->calculatePercent($this->gethelp->maturity_period);
    }

    public function calculatePercent($maturity_period)
    {
        $date = Carbon::parse($maturity_period);
        $now = Carbon::now();

        $diff = $date->diffInDays($now);
        $this->percent = ceil(($diff / 5) * 100);
    }

    public function requestPayment()
    {
        $this->gethelp->update([
            'awaiting_to_receive' => 1
        ]);
        $this->is_mature = true;
    }

    public function render()
    {
        return view('livewire.amount', [
            'gethelp' => GetHelp::find($this->gethelp->id)
        ]);
    }
}
