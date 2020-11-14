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

    public function mount()
    {

    }


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

        $provided = auth()->user()->providehelp()->where('confirmed', 0)->exists();

        $get_process = auth()->user()->gethelp()->where('received', 0)->exists();

        $comp_amount = auth()->user()->providehelp()->latest('created_at')->value('amount');

        if ($this->amount < $comp_amount) {
            session()->flash('error', 'Amount must not be lower than last investment');
            return;
        }

        if ($provided || $get_process) {
            session()->flash('error', 'You have a pending investment. Please complete that to continue');
            return;
        }

        $provide_help = ProvideHelp::create([
            'user_id' => auth()->user()->id,
            'amount' => $this->amount,
        ]);
        // $provide_helper = ProvideHelp::where([['amount', '!=', 1000], ['id', '!=',$provide_help->id]])->orWhere([['merge_status', 0], ['id', '!=',$provide_help->id]])->first();
        // dd(!$provide_helper);
        ProcessGH::dispatch($provide_help, auth()->user()->id)->delay(now()->addMinutes(30));
        $this->null();
        session()->flash('message', 'Investment has been created successfully. You will be merged to make payment soon.');
    }

    public function render()
    {
        return view('livewire.make-investment');
    }
}
