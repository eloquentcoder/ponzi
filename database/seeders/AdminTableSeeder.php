<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'first_name' => 'Patrick',
            'last_name' => 'Obafemi',
            'user_name' => 'patdgeerico',
            'email' => 'patrick.obaf@gmail.com',
            'phone_number' => '08064339248',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('password'),
            'email_verified_at' => now(),
            'account_details' => '0070006606',
            'bank_name' => 'Sterling Bank',
            'account_name' => 'Patrick Obafemi'
        ]);

        User::create([
            'first_name' => 'Friday',
            'last_name' => 'Ogbonna',
            'user_name' => 'friday_ogbonna',
            'email' => 'friday_ogbonna@gmail.com',
            'phone_number' => '08067066499',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('08067066499'),
            'email_verified_at' => now(),
            'account_details' => '3071359334',
            'bank_name' => 'First Bank',
            'account_name' => 'Olinya Friday Ogbonna'
        ]);

        User::create([
            'first_name' => 'chizoba',
            'last_name' => 'Ogili',
            'user_name' => 'chizoba_ogili',
            'email' => 'chizoba_ogili@gmail.com',
            'phone_number' => '09072319456',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('09072319456'),
            'email_verified_at' => now(),
            'account_details' => '0774174943',
            'bank_name' => 'Access Bank',
            'account_name' => 'Ogili chizoba Sophia'
        ]);

        User::create([
            'first_name' => 'michael',
            'last_name' => 'Adigu',
            'user_name' => 'michael_adigun',
            'email' => 'michael_adigun@gmail.com',
            'phone_number' => '09017450446',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('09017450446'),
            'email_verified_at' => now(),
            'account_details' => '0211124381',
            'bank_name' => 'GtBank',
            'account_name' => 'Adigu Michael'
        ]);

        User::create([
            'first_name' => 'SAMUEL',
            'last_name' => 'Omaiye',
            'user_name' => 'samuel_omaiye',
            'email' => 'samuel_omaiye@gmail.com',
            'phone_number' => '0704050008',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('0704050008'),
            'email_verified_at' => now(),
            'account_details' => '0015816985',
            'bank_name' => 'Stanbic IBTC',
            'account_name' => 'SAMUEL Omaiye'
        ]);

        User::create([
            'first_name' => 'Annabel',
            'last_name' => 'Ocholongwa',
            'user_name' => 'annabel_ocholongwa',
            'email' => 'annabel_ocholongwa@gmail.com',
            'phone_number' => '0811916918',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('0811916918'),
            'email_verified_at' => now(),
            'account_details' => '0811916918',
            'bank_name' => 'Access bank',
            'account_name' => 'Annabel Ocholongwa'
        ]);

        User::create([
            'first_name' => 'Morrison',
            'last_name' => 'Godwin',
            'user_name' => 'morrison_godwin',
            'email' => 'morrison_godwin@gmail.com',
            'phone_number' => '0171373944',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('0171373944'),
            'email_verified_at' => now(),
            'account_details' => '0171373944',
            'bank_name' => 'GtBank',
            'account_name' => 'Morrison Godwin'
        ]);

        User::create([
            'first_name' => 'Stephny',
            'last_name' => 'Roxy',
            'user_name' => 'stephny_roxy',
            'email' => 'stephny_roxy@gmail.com',
            'phone_number' => '09010213924',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('09010213924'),
            'email_verified_at' => now(),
            'account_details' => '0122156724',
            'bank_name' => 'GtBank',
            'account_name' => 'Stephny Roxy'
        ]);

        User::create([
            'first_name' => 'Abel',
            'last_name' => 'Obafemi',
            'user_name' => 'abel_obafemi',
            'email' => 'abel_obafemi@gmail.com',
            'phone_number' => '08175900016',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('08175900016'),
            'email_verified_at' => now(),
            'account_details' => '1228413230',
            'bank_name' => 'Access Bank',
            'account_name' => 'Morrison Godwin'
        ]);

    }
}
