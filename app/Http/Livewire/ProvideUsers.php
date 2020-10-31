<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;

class ProvideUsers extends Component
{
    public $get_ids;

    public function mount()
    {
        $this->mergeStatus();
    }

    protected function mergeStatus()
    {
        $this->get_ids = auth()->user()->gethelp()->where(
            ['merge_status' => 1],
            ['received' => 0]
        )->pluck('id')->toArray();

    }

    public function confirmPay($helper)
    {
        $provide_help = ProvideHelp::find($helper['id']);

        $provide_help->update([
            'confirmed' => 1
        ]);
        $amount = $provide_help->amount + ($provide_help->amount * 0.5);
        $amount_referral = $provide_help->amount * 0.02;

        auth()->user()->gethelp()->update([
            'received' => 1
        ]);

        if ($provide_help->amount != 1000) {
            GetHelp::create([
                'amount' => $amount,
                'user_id' => $provide_help->user->id
            ]);

            if ($provide_help->user->referrer) {
                $user = User::find($provide_help->user->referrer->id);
                $user->increment('referral_bonus', $amount_referral);
            }

        }


        $provide_help->user()->update([
            'activated' => 1
        ]);


        session()->flash('message', 'Payment Confirmed!');
    }

    public function render()
    {
        return view('livewire.provide-users', [
            'providehelpers' => ProvideHelp::whereIn('get_help_id', $this->get_ids ?? [])->where('confirmed', 0)->get()
        ]);
    }
}
