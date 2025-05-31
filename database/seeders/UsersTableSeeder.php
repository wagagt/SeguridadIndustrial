<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    public function run()
    {
        $users = [
            [
                'id'             => 1,
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('password'),
                'remember_token' => null,
            ],
            [
                'id'             => 2,
                'name'           => 'waga',
                'email'          => 'wagagt@gmail.com',
                'password'       => bcrypt('wagapass'),
                'remember_token' => null,
            ],
             [
                'id'             => 3,
                'name'           => 'Manuel Reyes',
                'email'          => 'manu@gmail.com',
                'password'       => bcrypt('manupass'),
                'remember_token' => null,
            ],
             [
                'id'             => 4,
                'name'           => 'Manfredo Perez',
                'email'          => 'manf@gmail.com',
                'password'       => bcrypt('manfpass'),
                'remember_token' => null,
            ],
             [
                'id'             => 5,
                'name'           => 'soriano',
                'email'          => 'soriano@gmail.com',
                'password'       => bcrypt('sorianopass'),
                'remember_token' => null,
            ],
        ];

        User::insert($users);
    }
}
