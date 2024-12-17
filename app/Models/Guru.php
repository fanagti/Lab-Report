<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    // Relasi satu ke banyak
    public function mapels()
    {
        return $this->hasMany(Mapel::class);
    }
}
