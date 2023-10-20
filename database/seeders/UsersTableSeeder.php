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
    }
}
