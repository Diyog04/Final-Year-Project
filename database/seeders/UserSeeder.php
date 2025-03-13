<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Diyog',  // Directly assigning the string without Str::
            'email' => 'user@user.com',  // Direct string assignment
            'password' => Hash::make('12345678'),  // Correct usage of Hash facade
            'role' => 'User'  // Assigning a string directly for the role
        ]);

        DB::table('users')->insert([
            'name' => 'Rochak',  // Directly assigning the string without Str::
            'email' => 'rochak@admin.com',  // Direct string assignment
            'password' => Hash::make('23456789'),  // Correct usage of Hash facade
            'role' => 'admin'  // Assigning a string directly for the role
        ]);

        DB::table('users')->insert([
            'name' => 'Pradip',  // Directly assigning the string without Str::
            'email' => 'pradip@vender.com',  // Direct string assignment
            'password' => Hash::make('34567890'),  // Correct usage of Hash facade
            'role' => 'vender'  // Assigning a string directly for the role
        ]);
    }
}
