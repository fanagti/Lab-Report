<?php

namespace App\Http\Middleware;

use App\Models\Lab;
use App\Models\LaporanLab;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

class CheckLabStatus
{
    public function handle(Request $request, Closure $next): Response
    {
        $currentTime = Carbon::now('Asia/Jakarta')->toTimeString(); // HH:MM:SS
        $currentDate = Carbon::now('Asia/Jakarta')->toDateString(); // YYYY-MM-DD
        // dd($currentDate);
        
        // 1. Update semua laporan dari hari sebelumnya menjadi expired
        $expiredLabIds = LaporanLab::whereDate('created_at', '<', $currentDate)
        ->where('exp', false)
        ->pluck('lab_id')
        ->toArray();
        
        // dd(!empty($expiredLabIds));
        if (!empty($expiredLabIds)) { // Cek apakah ada data sebelum eksekusi
            LaporanLab::whereDate('created_at', '<', $currentDate)
                ->where('exp', false)
                ->update(['exp' => true]);

            // 2. Update status lab jika lab_id ada di daftar expired
            foreach ($expiredLabIds as $labId) {
                $lab = Lab::find($labId);
                if (!$lab) continue;

                // Cek apakah ada laporan berjalan hari ini untuk lab ini
                $laporanBerjalan = LaporanLab::whereDate('created_at', $currentDate)
                    ->where('exp', false)
                    ->where('lab_id', $lab->id)
                    ->exists();

                if (!$laporanBerjalan) {
                    $lab->used = false;
                    $lab->user_id = null;
                    $lab->save();
                }
            }
        }

        // 3. Update laporan selesai menjadi expired
        $laporanSelesai = LaporanLab::whereDate('created_at', $currentDate)
            ->where('jam_selesai', '<', $currentTime)
            ->where('exp', false)
            ->orderBy('jam_selesai', 'asc')
            ->get();

        if ($laporanSelesai->isNotEmpty()) { // Cek apakah ada data sebelum looping
            foreach ($laporanSelesai as $laporan) {
                $laporan->exp = true;
                $laporan->save();

                // Set lab terkait menjadi "tidak digunakan"
                $lab = Lab::find($laporan->lab_id);
                if ($lab) {
                    $lab->used = false;
                    $lab->user_id = null;
                    $lab->save();
                }
            }
        }

        // 4. SET LAB SEDANG DIGUNAKAN JIKA ADA LAPORAN BERJALAN
        $laporanBerjalan = LaporanLab::whereDate('created_at', $currentDate)
            ->whereTime('jam_mulai', '<=', $currentTime)
            ->whereTime('jam_selesai', '>=', $currentTime)
            ->where('exp', false)
            ->get();
            // dd($laporanBerjalan);

        if ($laporanBerjalan->isNotEmpty()) { // Cek apakah ada data sebelum looping
            foreach ($laporanBerjalan as $laporan) {
                $lab = Lab::find($laporan->lab_id);
                if ($lab) {
                    $lab->used = true;
                    $lab->save();
                }
            }
        }

        return $next($request);
    }
}
