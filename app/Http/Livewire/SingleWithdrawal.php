<?php

namespace App\Http\Livewire;

use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class SingleWithdrawal extends Component
{
    public $ids;

    public function mount($id)
    {
        $this->ids = $id;
    }

    public function confirmPay($helper)
    {
        $provide_help = ProvideHelp::find($helper['id']);
        $provide_help->update([
            'confirmed' => 1
        ]);

        $amount = $provide_help->amount + ($provide_help->amount * 0.5);
        // $gethelp = $provide_help->gethelp;
        $gh_id = DB::table('get_provide')->where('provide_help_id', $provide_help->id)->pluck('get_help_id')->toArray();

        $gh = GetHelp::whereIn('id', $gh_id)->where([['received', 0], ['user_id', auth()->user()->id]])->first();

        $gh->update([
            'received' => 1,
        ]);

        $provide_exists = ProvideHelp::where([['id', $provide_help->id], ['confirmed', 0]])->exists();

        if ($provide_help->amount != 1000 || $provide_help->user->role != 'admin') {
            GetHelp::create([
                'amount' => $amount,
                'user_id' => $provide_help->user->id,
                'maturity_period' => now()->addDays(6)
            ]);

            if ($provide_help->user->referrer) {
                // $amount_referral = $provide_help->amount * 0.02;
                $amount_referral = $this->getReferralBonus($provide_help->providehelp->user->referrer, $provide_help->providehelp->amount);
                $user = User::find($provide_help->providehelp->user->referrer->id);
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
        return view('livewire.single-withdrawal', [
            'single_withdraw' => ProvideHelp::find($this->ids)
        ]);
    }
}
