<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Komunikasi extends Model
{
    use HasFactory;
    protected $table = 'komunikasi';
    protected $primaryKey = 'id';
    protected $fillable = ["pengguna_id", "bahasa_manusia_id"];
}
