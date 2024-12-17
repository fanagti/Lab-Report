<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailLaporanLab extends Model
{
    use HasFactory;
    protected $fillable = [
        'laporan_lab_id',
        'lab_id',
        'pc_id',
        'has_monitor', 
        'has_keyboard',  
        'has_mouse',  
        'has_pc'
    ];
    public function laporanLab()
    {
        return $this->belongsTo(LaporanLab::class);
    }

    // Relasi ke lab
    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }

    // Relasi ke PC
    public function pc()
    {
        return $this->belongsTo(PC::class);
    }
}
