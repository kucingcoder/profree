<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonfirmasiEmail extends Model
{
    use HasFactory;
    protected $table = "konfirmasi_email";
    protected $primaryKey = 'id';
    protected $fillable = ["kode", "pengguna_id", "created_at", "updated_at"];
}
