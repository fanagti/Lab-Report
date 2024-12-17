<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\PC;
use App\Models\Lab;
use Illuminate\Support\Facades\DB;

class PcsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Ambil semua lab
        $labIds = DB::table('labs')->pluck('id');

        foreach ($labIds as $labId) {
            for ($i = 1; $i <= 36; $i++) {
                DB::table('pcs')->insert([
                    'name' => 'PC ' . $i,
                    'has_monitor' => true,
                    'has_keyboard' => true,
                    'has_mouse' => true,
                    'has_pc' => true,
                    'lab_id' => $labId,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
