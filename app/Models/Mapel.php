<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'guru_id'];
    // Relasi ke guru
    public function guru()
    {
        return $this->belongsTo(Guru::class);
    }
}
