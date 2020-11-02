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
            'first_name' => 'David',
            'last_name' => 'Chukwu',
            'user_name' => 'david_chukwu',
            'email' => 'david_chukwu@gmail.com',
            'phone_number' => '08135876214',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('8135876214'),
            'email_verified_at' => now(),
            'account_details' => '0086069538',
            'bank_name' => 'Diamond Access',
            'account_name' => 'David Chukwu'
        ]);

        User::create([
            'first_name' => 'Chizoba',
            'last_name' => 'Ogili',
            'user_name' => 'chizoba_ogili',
            'email' => 'chizoba_ogili@gmail.com',
            'phone_number' => '09072319456',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('9072319456'),
            'email_verified_at' => now(),
            'account_details' => '0774174943',
            'bank_name' => 'Access Bank',
            'account_name' => 'Ogili chizoba Sophia'
        ]);

        User::create([
            'first_name' => 'Michael',
            'last_name' => 'Adigu',
            'user_name' => 'michael_adigun',
            'email' => 'michael_adigun@gmail.com',
            'phone_number' => '09017450446',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('9017450446'),
            'email_verified_at' => now(),
            'account_details' => '0211124381',
            'bank_name' => 'ZenithBank',
            'account_name' => 'Adigu Michael'
        ]);

        User::create([
            'first_name' => 'SAMUEL',
            'last_name' => 'Sunday',
            'user_name' => 'samuel_sunday',
            'email' => 'samuel_sunday@gmail.com',
            'phone_number' => '08136264061',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('704050008'),
            'email_verified_at' => now(),
            'account_details' => '0015816985',
            'bank_name' => 'Stanbic IBTC',
            'account_name' => 'SAMUEL Sunday'
        ]);

        User::create([
            'first_name' => 'Annabel',
            'last_name' => 'Ocholongwa',
            'user_name' => 'annabel_ocholongwa',
            'email' => 'annabel_ocholongwa@gmail.com',
            'phone_number' => '08067449938',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('8067449938'),
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
            'account_name' => 'Abel Obafemi'
        ]);


        User::create([
            'first_name' => 'Ekpewerechi',
            'last_name' => 'Onyinyechi',
            'user_name' => 'kanupearl',
            'email' => 'kanupearl@yahoo.com',
            'phone_number' => '08085395767',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('08085395767'),
            'email_verified_at' => now(),
            'account_details' => '0006657005',
            'bank_name' => 'GtBank',
            'account_name' => 'Ekpewerechi Onyinyechi'
        ]);

        User::create([
            'first_name' => 'Nwabueze',
            'last_name' => 'Chidiebere',
            'user_name' => 'nwabueze_chidiebere',
            'email' => 'nwabueze_chidiebere@gmail.com',
            'phone_number' => '08037264147',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('08037264147'),
            'email_verified_at' => now(),
            'account_details' => '0024092896',
            'bank_name' => 'Diamond Bank',
            'account_name' => 'Nwabueze Chidiebere'
        ]);

        User::create([
            'first_name' => 'Efange',
            'last_name' => 'Kate',
            'user_name' => 'efange_kate',
            'email' => 'efange_kate@gmail.com',
            'phone_number' => '07035120366',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('07035120366'),
            'email_verified_at' => now(),
            'account_details' => '0004847608',
            'bank_name' => 'GtBank',
            'account_name' => 'Efange Kate'
        ]);
    }
}
