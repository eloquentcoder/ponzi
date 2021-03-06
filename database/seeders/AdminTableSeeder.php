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
            'phone_number' => '07019318840',
            'is_special' => 1,
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('passwordnew11'),
            'email_verified_at' => now(),
            'account_details' => '7821645458',
            'bank_name' => 'Wema Bank',
            'account_name' => 'Patrick Obafemi'
        ]);

        User::create([
            'first_name' => 'David',
            'last_name' => 'Chukwu',
            'user_name' => 'david_chukwu',
            'email' => 'david_chukwu@gmail.com',
            'phone_number' => '08135876214',
            'role' => 'admin',
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('neweconomy'),
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
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('neweconomy'),
            'email_verified_at' => now(),
            'account_details' => '0774174943',
            'bank_name' => 'Access Bank',
            'account_name' => 'Ogili chizoba Sophia'
        ]);

        User::create([
            'first_name' => 'Michael',
            'last_name' => 'Adigu',
            'is_special' => 1,
            'user_name' => 'michael_adigun',
            'email' => 'michael_adigun@gmail.com',
            'phone_number' => '09017450446',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('neweconomy'),
            'email_verified_at' => now(),
            'account_details' => '2266127114',
            'bank_name' => 'Zenith Bank',
            'account_name' => 'Adigu Michael'
        ]);

        User::create([
            'first_name' => 'SAMUEL',
            'last_name' => 'Sunday',
            'user_name' => 'samuel_sunday',
            'is_special' => 1,
            'email' => 'samuel_sunday@gmail.com',
            'phone_number' => '08136264061',
            'role' => 'admin',
            'activated' => 1,
            'password' => bcrypt('newgettogether'),
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
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('newgettogether'),
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
            'phone_number' => '08035239118',
            'role' => 'admin',
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('newgettogether'),
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
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('passwordnew11'),
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
            'is_special' => 1,
            'activated' => 1,
            'password' => bcrypt('passwordnew11'),
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
            'password' => bcrypt('kitchenglory111'),
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
            'password' => bcrypt('enugu666'),
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
            'password' => bcrypt('mamalafric1999'),
            'email_verified_at' => now(),
            'account_details' => '0004847608',
            'bank_name' => 'GtBank',
            'account_name' => 'Efange Kate'
        ]);
    }
}
