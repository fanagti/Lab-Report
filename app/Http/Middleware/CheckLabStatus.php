<?php

namespace App\Http\Middleware;

use App\Models\Lab;
use App\Models\LaporanLab;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLabStatus
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        date_default_timezone_set('Asia/Jakarta');
        $currentTime = now()->toTimeString();

        // Ambil semua laporan lab yang selesai (jam_selesai < sekarang)
        $laporanSelesai = LaporanLab::where('jam_selesai', '<', $currentTime)
        ->where('exp','=', false)
        ->orderBy('jam_selesai', 'asc') // Urutkan dari terlama ke terbaru
        ->limit(16) // Batasi hingga 16 data
        ->get();
        // dd($laporanSelesai);
        foreach ($laporanSelesai as $laporan) {
            $laporan->exp = true; // Mengatur nilai atribut
            $laporan->save();
            // Set lab terkait menjadi "tidak digunakan"
            $lab = Lab::find($laporan->lab_id);
            if ($lab) {
                $lab->used = false;  // Atur lab menjadi "tidak digunakan"
                $lab->user_id = null;  // Atur lab menjadi "tidak digunakan"
                $lab->save();
            }
        }

        // Ambil semua laporan lab yang sedang berlangsung
        $laporanBerjalan = LaporanLab::where('jam_mulai', '<=', $currentTime)
            ->where('jam_selesai', '>=', $currentTime)
            ->limit(16) // Batasi hingga 16 data
            ->get();

        foreach ($laporanBerjalan as $laporan) {
            // Set lab terkait menjadi "sedang digunakan"
            $lab = Lab::find($laporan->lab_id);
            if ($lab) {
                $lab->used = true;  // Atur lab menjadi "sedang digunakan"
                $lab->save();
            }
        }
        return $next($request);
    }
}
