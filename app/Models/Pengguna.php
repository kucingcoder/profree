<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    use HasFactory;
    protected $table = "pengguna";
    protected $primaryKey = 'id';
    protected $fillable = ["email", "sandi", "nama", "domisili", "deskripsi", "projek", "pengalaman", "jenis_kelamin_id", "jenis_akun_id", "status_akun_id", "created_at", "updated_at"];
}
