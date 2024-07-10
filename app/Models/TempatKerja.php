<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TempatKerja extends Model
{
    use HasFactory;
    protected $table = 'tempat_kerja';
    protected $primaryKey = 'id';
    protected $fillable = ["pengguna_id", "platform_id", "profil"];

    public function Platform()
    {
        return $this->belongsTo(Platform::class, 'platform_id', 'id');
    }
}
