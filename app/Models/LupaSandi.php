<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LupaSandi extends Model
{
    use HasFactory;
    protected $table = "lupa_sandi";
    protected $primaryKey = 'id';
    protected $fillable = ["code", "pengguna_id", "created_at", "updated_at"];
}
