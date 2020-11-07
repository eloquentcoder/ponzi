<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\GetHelp;
use Livewire\Component;
use App\Models\ProvideHelp;
use App\Models\Transaction;
use Illuminate\Support\Facades\DB;
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
        $this->get_ids = auth()->user()->gethelp()->where('merge_status', 1)->pluck('id')->toArray();
    }

    public function confirmPay($helper)
    {
        $provide_help = ProvideHelp::find($helper['id']);
        $provide_help->update([
            'confirmed' => 1
        ]);
        $amount = $provide_help->amount + ($provide_help->amount * 0.5);

        // $gethelp = $provide_help->gethelp;
        // $gh = GHTransaction::where([
        //     ['get_help_id', $gethelp->id],
        //     ['amount', $provide_help->amount]
        // ])->first();
        // $gh->update([
        //     'received' => 1,
        // ]);

        // $provide_exists = PHTransaction::where([['provide_help_id', $provide_help->providehelp->id], ['confirmed', 0]])->exists();

        // if ($provide_help->providehelp->amount != 1000 && !$provide_exists) {
        //     GetHelp::create([
        //         'amount' => $amount,
        //         'user_id' => $provide_help->providehelp->user->id,
        //         'maturity_period' => now()->addDays(6)
        //     ]);

        //     if ($provide_help->$providehelp->user->referrer) {
        //         // $amount_referral = $provide_help->amount * 0.02;
        //         $amount_referral = $this->getReferralBonus($provide_help->providehelp->user->referrer, $provide_help->providehelp->amount);
        //         $user = User::find($provide_help->providehelp->user->referrer->id);
        //         $user->increment('referral_bonus', $amount_referral);
        //     }

        //     Transaction::create([
        //         'amount' => $provide_help->amount,
        //         'type' => 'provide_help',
        //         'user_id' => $provide_help->providehelp->user->id
        //     ]);

        //     Transaction::create([
        //         'amount' => $provide_help->providehelp->amount,
        //         'type' => 'get_help',
        //         'user_id' => auth()->user()->id
        //     ]);

        //     if ($provide_help->proof_of_payment) {
        //         Storage::delete(['photos/'.$provide_help->proof_of_payment]);
        //     }

        //     session()->flash('message', 'Payment Confirmed Successfully!');
        //     if (auth()->user()->role == 'admin') {
        //         return redirect()->route('admin.testimony.make');
        //     }
        //     return redirect()->route('testimony.make');

        // }

        // $provide_help->providehelp->user()->update([
        //     'activated' => 1
        // ]);

        // Transaction::create([
        //     'amount' => $provide_help->amount,
        //     'type' => 'activation',
        //     'user_id' => $provide_help->providehelp->user->id
        // ]);

        // Transaction::create([
        //     'amount' => $provide_help->amount,
        //     'type' => 'get_help',
        //     'user_id' => auth()->user()->id
        // ]);

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
        $prov_ids = DB::table('get_provide')->whereIn('get_help_id', $this->get_ids ?? [])->pluck('provide_help_id')->toArray();
        return view('livewire.provide-users', [
            'providehelpers' => ProvideHelp::where('confirmed', 0)->whereIn('provide_help_id', $prov_ids ?? [])->get()
        ]);
    }
}
