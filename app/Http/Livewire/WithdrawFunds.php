<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Jobs\ProcessWithdrawRequest;
use Illuminate\Support\Facades\Hash;

class WithdrawFunds extends Component
{

    public $amount;
    public $password;
    public $referral_bonus;
    public $hasbrokers;
    public $user;

    public function mount()
    {
       $this->user = User::find(auth()->user()->id);
       $this->referral_bonus =  $this->user->referral_bonus;
       $this->hasbrokers = User::where([['activated', 1], ['referrer_id', auth()->user()->id]])->count();
    }


    protected function null()
    {
        $this->amount = null;
        $this->password = null;
    }

    public function withrawBonus()
    {
        if (!Hash::check($this->password, auth()->user()->password)) {
            return $this->addError('password', 'Password Is Incorrect, Check And Try Again');
        }

        $provided = auth()->user()->providehelp()->where('confirmed', 0)->exists();

        $get_process = auth()->user()->gethelp()->where('received', 0)->exists();

        if ($provided || $get_process) {
            session()->flash('error', 'You have a pending investment. Please complete that to continue');
            return;
        }

        if ($this->hasbrokers < 15) {
            session()->flash('error', 'Your Brokers should be no less than 15');
            return;
        }

        if ($this->referral_bonus < 5000) {
            session()->flash('error', 'Your Referral Bonus should be no less than 5000');
            return;
        }

        $get_help = GetHelp::create([
            'amount' => $this->amount,
            'user_id' => auth()->user()->id,
            'is_bonus_withdrawal' => true
        ]);

        ProcessWithdrawRequest::dispatch($gethelp, auth()->user()->id)->delay(now()->addMinutes(3));

        $this->user->decrement('referral_bonus', $this->amount);

        $this->null();
        session()->flash('message', 'Withdrawal Made Successfully! You will be merged soon.');
    }

    public function render()
    {
        return view('livewire.withdraw-funds');
    }
}
