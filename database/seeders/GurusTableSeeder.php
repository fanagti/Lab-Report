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
                'name' => 'Arief Kurniawan, ST.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Budi Sulistiyo, S.Kom., M.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Atik Retnoningsih, S.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Dwi Nuryani, S.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Carolin Windiasri, S.Pd.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Agung Wiratmo, S.Pd.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Teguh Priyanto, S.Pd.T.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tri Ani Sulistyo Wardani, S.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tina Fajrin, S.Pd., S.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Liana Masitoh, S.Kom.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Afif Nuruddin Maisaroh, S.Pd.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
