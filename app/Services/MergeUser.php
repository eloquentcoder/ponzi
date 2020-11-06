<?php

namespace App\Services;

class MergeUser {


    public static function merge($amount)
    {
        switch ($amount) {
            case 7500:
                self::merge7500();
                break;
            case 15000:
                self::merge15000();
                break;
            case 30000:
                self::merge30000();
                break;
            case 75000:
                self::merge75000();
                break;
            case 150000:
                self::merge150000();
                break;
            case 300000:
                self::merge300000();
                break;
            case 450000:
                self::merge450000();
                break;
            default:
                self::merge750000();
                break;
        }
    }

    private static function merge7500()
    {
        $admin = User::where([['role', 'admin'], ['is_special', 1]])->get()->random();
        $provide_help = ProvideHelp::where('amount', 5000)->first();
        $adminProvider = ProvideHelp::create([
            'amount' => 2500,
            'merge_status' => 1,
            'user_id' => $admin->id
        ]);
        return collect([$provide_help, $adminProvider]);
    }

    



}
