<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\Transaction;
use Illuminate\Support\Facades\Storage;

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

        $provide_help->gethelp()->update([
            'received' => 1
        ]);

        if ($provide_help->amount != 1000) {
            GetHelp::create([
                'amount' => $amount,
                'user_id' => $provide_help->user->id
            ]);

            if ($provide_help->user->referrer) {
                // $amount_referral = $provide_help->amount * 0.02;
                $amount_referral = $this->getReferralBonus($provide_help->user->referrer, $provide_help->amount);
                $user = User::find($provide_help->user->referrer->id);
                $user->increment('referral_bonus', $amount_referral);
            }

            Transaction::create([
                'amount' => $provide_help->amount,
                'type' => 'provide_help',
                'user_id' => $provide_help->user->id
            ]);

            Transaction::create([
                'amount' => $provide_help->amount,
                'type' => 'get_help',
                'user_id' => auth()->user()->id
            ]);

            if ($provide_help->proof_of_payment) {
                Storage::delete(['photos/'.$provide_help->proof_of_payment]);
            }

            session()->flash('message', 'Payment Confirmed Successfully!');
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.testimony.make');
            }
            return redirect()->route('testimony.make');

        }

        $provide_help->user()->update([
            'activated' => 1
        ]);

        Transaction::create([
            'amount' => $provide_help->amount,
            'type' => 'activation',
            'user_id' => $provide_help->user->id
        ]);

        Transaction::create([
            'amount' => $provide_help->amount,
            'type' => 'get_help',
            'user_id' => auth()->user()->id
        ]);

        if ($provide_help->proof_of_payment) {
            Storage::delete(['photos/'.$provide_help->proof_of_payment]);
        }

            session()->flash('message', 'Payment Confirmed Successfully!');
            if (auth()->user()->role == 'admin') {
                return redirect()->route('admin.testimony.make');
            }
            return redirect()->route('testimony.make');
    }


    private function getReferralBonus($referrer, $amount)
    {
        $user = User::find($referrer->id);
        $referral_count = User::where([['referrer_id', $user->id], ['activated', 1]])->count();

        if ($referral_count >= 60) {
            return $amount * 0.05;
        } else if ($referral_count >= 15 && $referral_count < 60) {
            return $amount * 0.03;
        } else {
            return $amount * 0.02;
        }

    }

    public function render()
    {
        return view('livewire.provide-users', [
            'providehelpers' => ProvideHelp::with('user')->whereIn('get_help_id', $this->get_ids ?? [])->where('confirmed', 0)->get()
        ]);
    }
}
