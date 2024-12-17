<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        
        // Panggil seeder PcsTableSeeder
        $this->call(UsersTableSeeder::class);
        $this->call(LabsTableSeeder::class);
        $this->call(PcsTableSeeder::class);
        $this->call(GurusTableSeeder::class);
        $this->call(MapelsTableSeeder::class);
    }
}
