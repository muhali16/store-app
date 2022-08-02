<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Wallet;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        Wallet::create([
            'wallet_name'=> 'loren wallet',
            'saldo' => 0,
            'user_id' => 1,
            'no_hp' => '082297531427',
            'alamat' => 'Jalan merdeka 1, blok d16',
        ]);

        User::create([
            'photo' => 'profile-photo/user.jpg',
            'slug' => 'laurence' . str()->random(11),
            'level' => 3,
            'firstname' => 'Laurence Nicholas',
            'lastname' => 'Saputra',
            'bio' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores veritatis ea aliquam dicta expedita consequatur.',
            'email' => 'loren@gmail.com',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);
    }
}
