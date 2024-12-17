<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pc extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','has_monitor', 'has_keyboard', 'has_mouse', 'has_pc', 'lab_id',
    ];
        // Relasi banyak ke satu dengan Lab
        public function lab()
        {
            return $this->belongsTo(Lab::class);
        }
    
        // Tentukan kolom yang dapat diisi
        
}
