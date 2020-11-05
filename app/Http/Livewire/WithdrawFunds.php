<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use Illuminate\Support\Facades\Hash;

class WithdrawFunds extends Component
{

    public $amount;
    public $password;
    public $referral_bonus;
    public $hasbrokers;

    public function mount()
    {
       $this->referral_bonus = User::find(auth()->user()->id)->referral_bonus;
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

        if ($this->hasbrokers < 15) {
            session()->flash('error', 'Your Brokers should be no less than 15');
            return;
        }

        GetHelp::create([
            'amount' => $this->amount,
            'user_id' => auth()->user()->id
        ]);

        // $user = User::where([
        //     ['activated', 1],
        //     ['role', 'user'],
        //     ['id', '!=', auth()->user()->id]
        // ])->first();

        // if (!$user) {
        //     $admin = User::where('role', 'admin')->get()->random();

        //     $get_help = $admin->gethelp()->create([
        //         'amount' => $this->amount,
        //         'merge_status' => true,
        //     ]);

        //     $provide_help = ProvideHelp::create([
        //         'user_id' => auth()->user()->id,
        //         'merge_status' => 1,
        //         'amount' => $this->amount,
        //         'get_help_id' => $get_help->id
        //     ]);
        // } else {
        //     $provide_help = ProvideHelp::create([
        //         'user_id' => auth()->user()->id,
        //         'amount' => $this->amount,
        //     ]);
        // }

        $this->null();
        session()->flash('message', 'Withdrawal Made Successfully! You will be merged soon.');
    }

    public function render()
    {
        return view('livewire.withdraw-funds');
    }
}
