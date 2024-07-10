<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kemampuan extends Model
{
    use HasFactory;
    protected $table = 'kemampuan';
    protected $primaryKey = 'id';
    protected $fillable = ["pengguna_id", "jenis_produk_id", "bahasa_pemograman_id"];

    public function JenisProduk()
    {
        return $this->belongsTo(JenisProduk::class, 'jenis_produk_id', 'id');
    }

    public function BahasaPemograman()
    {
        return $this->belongsTo(BahasaPemograman::class, 'bahasa_pemograman_id', 'id');
    }
}
