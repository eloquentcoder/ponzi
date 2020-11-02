<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\GetHelp;
use Livewire\Component;

class Amount extends Component
{
    public $is_mature = false;
    public $gethelp;
    public $percent;
    public $diff;
    public $awaiting;

    public function mount()
    {
        $now = Carbon::now();
        $this->gethelp = auth()->user()->gethelp()->where([['merge_status', 0]])->whereDate('maturity_period', '>=', $now)->first();
        if ($this->gethelp) {
             $this->calculatePercent($this->gethelp->maturity_period);
        }
        $this->awaiting = $this->gethelp->awaiting_to_receive;
    }

    public function calculatePercent($maturity_period)
    {
        $date = Carbon::parse($maturity_period);
        $now = Carbon::now();
        $this->diff = $date->diffInDays($now);


        $this->percent = ceil(((5  - $this->diff) / 5) * 100);
    }

    public function requestPayment()
    {
        $this->gethelp->update([
            'awaiting_to_receive' => 1
        ]);
        $this->awaiting = $this->gethelp->awaiting_to_receive;

    }

    public function render()
    {
        return view('livewire.amount', [
            'gethelp' => GetHelp::findorFail($this->gethelp->id)
        ]);
    }
}
