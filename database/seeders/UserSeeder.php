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
        // $users = [
        //     [
        //         'name' => 'Adminn',
        //         'email' => 'admin1@gmail.com',
        //         'password' => '123123',
        //     ],
        //     [
        //         'name' => 'Arass',
        //         'email' => 'aras2@gmail.com',
        //         'password' => '123123',
        //     ],

        //     ];

        // User::insert($users);
            // Yönetici kullanıcıları oluştur
            User::create([
                'name' => 'Admin User 1',
                'email' => 'admin1@example.com',
                'password' => '123123',
                'is_admin' => true, // Yönetici
            ]);

            User::create([
                'name' => 'Admin User 2',
                'email' => 'admin2@example.com',
                'password' => '123123',
                'is_admin' => true, // Yönetici
            ]);

            // Normal kullanıcıları oluştur
            User::create([
                'name' => 'Normal User 1',
                'email' => 'user1@example.com',
                'password' => '123123',
                'is_admin' => false, // Normal kullanıcı
            ]);

            User::create([
                'name' => 'Normal User 2',
                'email' => 'user2@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 3',
                'email' => 'user3@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 4',
                'email' => 'user4@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 5',
                'email' => 'user5@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 6',
                'email' => 'user6@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 7',
                'email' => 'user7@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);

            User::create([
                'name' => 'Normal User 8',
                'email' => 'user8@example.com',
                'password' => '123123',
                'is_admin' => false,
            ]);
    }
}
