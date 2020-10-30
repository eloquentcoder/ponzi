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

        $helper->update([
            'confirmed' => 1
        ]);
        $amount = $helper->amount + ($helper->amount * 0.5);
        $amount_referral = $helper->amount * 0.02;

        auth()->user()->gethelp()->update([
            'received' => 1
        ]);

        GetHelp::create([
            'amount' => $amount,
            'user_id' => $helper->user->id
        ]);
        if ($helper->user->referrer) {
            $user = User::find($helper->user->referrer->id);
            $user->increment('referral_bonus', $amount_referral);
        }

        session()->flash('message', 'Payment Confirmed!');
    }

    public function render()
    {
        return view('livewire.provide-users', [
            'providehelpers' => ProvideHelp::whereIn('get_help_id', $this->get_ids ?? [])->get()
        ]);
    }
}
