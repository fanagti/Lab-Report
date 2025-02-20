<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Lab;
use Illuminate\Support\Facades\DB;

class LabsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('labs')->insert([
            [
                'name' => 'Lab 1',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab 2',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab 3',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab 4',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab 5',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab 6',
                'status' => true,
                'used' => false,
                'network' => false,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Lab Informatika',
                'status' => true,
                'used' => false,
                'network' => true,
                'user_id' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    
    }
}
