<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'firstname' => 'atik',
            'lastname' => 'admin',
            'username' => 'atikadmin',
            'email' => 'atikadmin@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 'admin',
        ]);

        User::create([
            'firstname' => 'atik',
            'lastname'  => 'vendor',
            'username'  => 'atikvendor',
            'email'     => 'atikvendor@gmail.com',
            'password'  =>  bcrypt('123456'),
            'role'      => 'vendor',
            'is_vendor' => 1,
        ]);

        User::create([
            'firstname' => 'atik',
            'lastname'  => 'customer',
            'username'  => 'atikcustomer',
            'email'     => 'atikcustomer@gmail.com',
            'password'  => bcrypt('123456'),
            'role'      => 'customer',
        ]);
    }
}
