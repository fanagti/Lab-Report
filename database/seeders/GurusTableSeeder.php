<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GurusTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('gurus')->insert([
            [
                'name' => 'Guru A',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guru B',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Guru C',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
