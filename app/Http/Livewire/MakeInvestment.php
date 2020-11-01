<?php

namespace App\Http\Livewire;

use App\Models\User;
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

        $user = User::where([
            ['activated', 1],
            ['role', 'user'],
            ['id', '!=', auth()->user()->id]
        ])->first();

        if (!$user) {
            $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();

            $get_help = $admin->gethelp()->create([
                'amount' => $this->amount,
                'merge_status' => true,
            ]);

            $provide_help = ProvideHelp::create([
                'user_id' => auth()->user()->id,
                'merge_status' => 1,
                'amount' => $this->amount,
                'get_help_id' => $get_help->id
            ]);
        } else {
            $provide_help = ProvideHelp::create([
                'user_id' => auth()->user()->id,
                'amount' => $this->amount,
            ]);
        }

        $this->null();
        session()->flash('message', 'Investment Made Successfully! You will be merged to pay soon.');
    }

    public function render()
    {
        return view('livewire.make-investment');
    }
}
