<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisProduk extends Model
{
    use HasFactory;
    protected $table = 'jenis_produk';
    protected $primaryKey = 'id';

    public function Kemampuan()
    {
        return $this->hasMany(Kemampuan::class, 'jenis_produk_id', 'id');
    }
}
