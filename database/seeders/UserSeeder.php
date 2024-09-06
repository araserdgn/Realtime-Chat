<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Adminn',
                'email' => 'admin1@gmail.com',
                'password' => Hash::make('password'),
            ],
            [
                'name' => 'Arass',
                'email' => 'aras2@gmail.com',
                'password' => Hash::make('password'),
            ],

            ];

        User::insert($users);
    }
}
