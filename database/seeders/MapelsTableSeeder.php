<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil ID guru
        $guruIds = DB::table('gurus')->pluck('id');

        foreach ($guruIds as $guruId) {
            // Tentukan mata pelajaran untuk setiap guru
            $mapels = ['Matematika', 'Fisika', 'Kimia'];

            foreach ($mapels as $mapel) {
                DB::table('mapels')->insert([
                    'name' => $mapel,
                    'guru_id' => $guruId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
