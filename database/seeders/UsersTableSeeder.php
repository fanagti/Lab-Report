<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'class' => 'Admin',
                'email' => 'admin@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('adminpassword'), // Ubah sesuai kebutuhan
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'RPL A',
                'email' => 'user1@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'RPL B',
                'email' => 'user2@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'RPL C',
                'email' => 'user3@example.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
