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
    public $amount_percent;
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
        $this->diff = $date->diffInMinutes($now);
        $this->percent = ceil(((5  - $this->diff) / 5) * 100);
        switch ($this->diff) {
            case 0:
               $this->amount_percent = 0.5;
                break;
            case 1:
                $this->amount_percent = 0.3;
                break;
            case 2:
                    $this->amount_percent = 0.15;
                    break;
            case 3:
                    $this->amount_percent = 0.06;
                    break;
            case 4:
                    $this->amount_percent = 0.02;
                    break;
            default:
            $this->amount_percent = 0;
                break;
        }
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
