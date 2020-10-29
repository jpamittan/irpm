<?php

namespace Database\Seeders;

use Hash, Str;
use App\Models\User;
use Illuminate\Database\Seeder;

class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'first_name' => 'Arif',
            'last_name' => 'Khan',
            'email' => 'akhan@synchronogroup.com',
            'password' => Hash::make('password123'),
            'remember_token' => Str::random(60),
            'is_admin' => 1
        ]);
    }
}
