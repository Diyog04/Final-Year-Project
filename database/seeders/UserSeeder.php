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
            'name' => 'Admin',  // Directly assigning the string without Str::
            'email' => 'admin@admin.com',  // Direct string assignment
            'password' => Hash::make('123456789'),  // Correct usage of Hash facade
            'role' => 'admin'  // Assigning a string directly for the role
        ]);

       
    }
}
