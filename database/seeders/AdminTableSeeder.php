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

    }
}
