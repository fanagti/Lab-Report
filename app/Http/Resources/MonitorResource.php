<?php

namespace App\Http\Resources;

use App\Models\LaporanLab;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MonitorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {   
        if ($this->used == 1) {
            // Ambil laporan terbaru berdasarkan ID lab
            $latestLaporan = LaporanLab::where('lab_id', $this->id)->latest()->first();

            return [
                'lab_name'   => $latestLaporan?->lab?->name ?? 'N/A',
                'used'       => $this->used,
                'status'     => $this->status,
                'user'       => $this->user,
                'guru_name'  => $latestLaporan?->guru?->name ?? 'N/A',
                'mapel_name' => $latestLaporan?->mapel?->name ?? 'N/A',
                'jam_mulai'  => $latestLaporan?->jam_mulai ?? 'N/A',
                'jam_selesai'=> $latestLaporan?->jam_selesai ?? 'N/A',
            ];
        }
        return [
            'lab_name'   => $this->name,
            'status'       =>$this->status,
            'message' => 'Lab tidak digunakan'
        ];
    }
}
