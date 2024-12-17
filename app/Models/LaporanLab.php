<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaporanLab extends Model
{
    use HasFactory;
    protected $fillable = [
        'lab_id',
        'guru_id',
        'mapel_id',
        'user_id',
        'jam_mulai',
        'jam_selesai'
    ];

    public function lab()
    {
        return $this->belongsTo(Lab::class);
    }
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
    public function mapel()
    {
        return $this->belongsTo(Mapel::class);
    }


}
