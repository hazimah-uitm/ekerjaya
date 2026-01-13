<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Hazimah',
                'email' => 'hazimahpethie@gmail.com',
                'password' => Hash::make('hazimah123'),
                'publish_status' => true,
                'email_verified_at' => now(), 
            ],
        ]);
    }
}
