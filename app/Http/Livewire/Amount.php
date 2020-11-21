<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\GetHelp;
use Livewire\Component;
use App\Jobs\ProcessWithdrawRequest;

class Amount extends Component
{
    public $is_mature = false;
    public $gethelp;
    public $percent;
    public $amount_percent;
    public $diff;
    public $date;
    public $diffCounter;
    public $awaiting;


    public function mount()
    {
        $now = Carbon::now();
        $this->gethelp = auth()->user()->gethelp()->where([['received', 0]])->first();
        if ($this->gethelp) {
             $this->calculatePercent($this->gethelp->maturity_period);
        }
        $this->awaiting = $this->gethelp->awaiting_to_receive;
    }

    public function calculatePercent($maturity_period)
    {
        $this->date = Carbon::parse($maturity_period);
        $now = Carbon::now();

        if ($this->date < $now) {
            $this->diff = 0;
            $this->percent = 100;
        } else {
            $this->diff = $this->date->diffInDays($now) + 1;
            // dd($this->diff);
            $this->diffCounter = $this->date->diff($now)->format('%D:%H:%I:%S');
            $this->percent = ceil(((5  - $this->diff) / 5) * 100);
        }

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
        ProcessWithdrawRequest::dispatch($this->gethelp, auth()->user()->id);
        $this->awaiting = $this->gethelp->awaiting_to_receive;

    }

    public function render()
    {
        return view('livewire.amount', [
            'gethelp' => GetHelp::findorFail($this->gethelp->id)
        ]);
    }
}
