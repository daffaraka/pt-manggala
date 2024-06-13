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
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Admin');


        $admin = User::create([
            'name' => 'SPV',
            'username' => 'spv',
            'email' => 'spv@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('SPV');


        $admin = User::create([
            'name' => 'User',
            'username' => 'user',
            'email' => 'user@gmail.com',
            'password' => Hash::make('password'),
        ]);
        $admin->assignRole('Admin');
    }
}
