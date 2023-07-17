<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class Adminseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $users = [
            [
                'name' => 'Admin',
                'email' => 'anasalrmmone22@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 0,
                'access' => true,
            ],
            [
                'name' => 'User',
                'email' => 'Ashourabood@gmail.com',
                'password' => bcrypt('123456'),
                'role' => 1,
                'access' => false,
            ]
                ];
        foreach ($users as $user)
        {
            User::created($user);
        }
    }
}
