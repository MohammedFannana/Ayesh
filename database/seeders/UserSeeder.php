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
        User::create([
            'name' => 'admin' ,
            'phone' => '1234567890',
            'email' => 'admin@admin',
            'type' => 'admin',
            'password' => Hash::make('123456789'),

        ]);
    }
}
