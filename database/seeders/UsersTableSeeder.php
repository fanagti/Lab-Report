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
                'email' => 'admin@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('adminpassword'), // Ubah sesuai kebutuhan
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'XI RPL A',
                'email' => '11ra@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'XI RPL B',
                'email' => '11rb@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'XI RPL C',
                'email' => '11rc@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X RPL A',
                'email' => '10ra@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X RPL B',
                'email' => '10rb@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X RPL C',
                'email' => '10rc@rpl.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X OTO A',
                'email' => '10oa@oto.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X OTO B',
                'email' => '10ob@oto.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X OTO C',
                'email' => '10oc@oto.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X TEKSTIL A',
                'email' => '10ta@tekstil.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X TEKSTIL B',
                'email' => '10tb@tekstil.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X TEKSTIL C',
                'email' => '10tc@tekstil.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X Mesin A',
                'email' => '10ma@mesin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X Mesin B',
                'email' => '10mb@mesin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'class' => 'X Mesin C',
                'email' => '10mc@mesin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('123'), // Ubah sesuai kebutuhan
                'role' => 'user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
