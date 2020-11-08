<?php

namespace App\Services;

use App\Models\User;
use App\Models\ProvideHelp;

class MergeServices {

    public static function mergeGetters($get_help)
    {
        $provider = ProvideHelp::where([['is_activation', 0], ['merge_status', 0], ['amount', '<', $get_help->amount]])->get();
        dd($provider);

        $single_provider = ProvideHelp::where([['amount', $get_help->amount], ['merge_status', 0]])->first();
        if ($single_provider) {
            $single_provider->update([
                'merge_status' => 1
            ]);
            $get_help->update([
                'merge_status' => 1
            ]);
        $get_help->providehelp()->sync($single_provider->id);
        } else {
            self::getTwoSum($provider, $get_help);
        }
    }

    // public static function getThreeSum($array, $sum)
    // {
    //      for ($i=0; $i < count($array); $i++) {

    //      }
    // }

    public static function getTwoSum($array, $get_help)
    {
       foreach ($array as $value) {
            $initialProvider = ProvideHelp::where([['amount', $get_help->amount - $value->amount], ['merge_status', 0]])->first();
            if ($initialProvider) {
                $value->update([
                    'merge_status' => 1
                ]);
                $initialProvider->update([
                    'merge_status' => 1
                ]);
              return  $get_help->providehelp()->sync([$initialProvider->id, $value->id]);
            }
       }
       if (count($array) > 0) {
        $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();
        $provide_admin = $admin->providehelp()->create([
             'merge_status' => 1,
             'amount' => $get_help->amount - $array[0]->amount
        ]);
        $secadmin = $array[0]->update([
             'merge_status' => 1,
        ]);
        return  $get_help->providehelp()->sync([$provide_admin->id, $secadmin->id]);
       }
    }


}
