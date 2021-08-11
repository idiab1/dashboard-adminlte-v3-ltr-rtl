<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'name' => 'Admin',
                'email' => 'admin@test.com',
                'is_admin' => '1',
                'password' => Hash::make('123456789'),
                'avatar' => 'avatar.png'
            ],
            [
                'name' => 'user',
                'email' => 'user@test.com',
                'is_admin' => '0',
                'password' => Hash::make('123456789'),
                'avatar' => 'avatar.png'
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
