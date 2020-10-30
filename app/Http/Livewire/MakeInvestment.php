<?php

namespace App\Http\Livewire;

use App\Models\User;
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

        $user = User::where([
            ['activated', 1],
            ['role', 'user'],
            ['id', '!=', auth()->user()->id]
        ])->first();

        if (!$user) {
            $admin = User::where('role', 'admin')->get()->random();

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
