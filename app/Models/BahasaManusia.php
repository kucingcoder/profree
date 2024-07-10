<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasaManusia extends Model
{
    use HasFactory;
    protected $table = 'bahasa_manusia';
    protected $primaryKey = 'id';
}
