<?php

namespace App\Services;

class MergeServices {

    public static function mergeGetters($gethelp)
    {
        $amount = $gethelp->amount;

        $provider_one = ProvideHelp::where(
            ['merge_status', 0],
            ['amount', $amount]
            )->first();
        $provider_two = ProvideHelp::where(
            ['merge_status', 0],
            ['amount', $amount/ 2]
            )->first();

        if ($provider_one) {
            $provider_one->update([
                'merge_status' => 1,
                'get_help_id' => $gethelp->id
            ]);
        } else {
            self::mergeAdmin($amount, $gethelp->id);
        }

        if ($provider_two) {
            $provider_two->update([
                'merge_status' => 1,
                'get_help_id' => $gethelp->id
            ]);
        } else {
            self::mergeAdmin($amount / 2, $gethelp->id);
        }

        return $gethelp->update([
            'merge_status' => 1
        ]);

    }

    public static function mergeAdmin($amount, $gethelp_id)
    {
        $user = User::where([['role', 'admin'], ['is_special', 1]])->first();
        $provide = $user->providehelp()->create([
            'amount' => $amount,
            'merge_status' => 1,
            'get_help_id' => $gethelp_id
        ]);

    }

}
