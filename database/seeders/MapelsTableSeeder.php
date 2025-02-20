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
        DB::table('mapels')->insert([
            [
                'name' => 'Informatika',
                'guru_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Mapel Pilihan (Sistem Informasi)',
                'guru_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Dasar-Dasar Program Keahlian PPLG',
                'guru_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Project Kreatif dan Kewirausahaan',
                'guru_id' => 3,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Berbasis Teks, Grafis, dan Multimedia',
                'guru_id' => 4,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Perangkat Bergerak',
                'guru_id' => 5,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Dasar-Dasar Program Keahlian PPLG',
                'guru_id' => 6,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Informatika',
                'guru_id' => 7,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Basis Data',
                'guru_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Mapel Pilihan (Basis Data)',
                'guru_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Web',
                'guru_id' => 8,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Project Kreatif dan Kewirausahaan',
                'guru_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Mapel Pilihan (Basis Data)',
                'guru_id' => 9,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Berbasis Teks, Grafis, dan Multimedia',
                'guru_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Perangkat Bergerak',
                'guru_id' => 10,
                'created_at' => now(),
                'updated_at' => now(),
            ],[
                'name' => 'Pemrograman Web',
                'guru_id' => 11,
                'created_at' => now(),
                'updated_at' => now(),
            ]
    ]);
        
    }
}
