<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Jobs\ProcessGH;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use Illuminate\Support\Facades\Hash;

class MakeInvestment extends Component
{

    public $amount;
    public $password;

    protected function null()
    {
        $this->amount = null;
        $this->password = null;
    }

    public function submitInvestment()
    {
        if (!Hash::check($this->password, auth()->user()->password)) {
            return $this->addError('password', 'Password Is Incorrect, Check And Try Again');
        }

        $provided = ProvideHelp::where([
            ['user_id', auth()->user()->id],
            ['confirmed', 0],
        ])->exists();

        $get_process = GetHelp::where([
            ['user_id', auth()->user()->id],
            ['received', 0],
        ])->exists();

        if ($provided || $get_process) {
            session()->flash('error', 'You have a pending investment. Please complete that to continue');
            return;
        }

        $provide_help = ProvideHelp::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
        ]);

        ProcessGH::dispatch($provide_help, auth()->user()->id)->delay(now()->addMinutes(10));


        $this->null();
        session()->flash('message', 'Investment Made Successfully! You will be merged to pay soon.');
    }

    public function render()
    {
        return view('livewire.make-investment');
    }
}
