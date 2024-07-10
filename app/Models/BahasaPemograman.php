<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BahasaPemograman extends Model
{
    use HasFactory;
    protected $table = 'bahasa_pemograman';
    protected $primaryKey = 'id';

    public function Kemampuan()
    {
        return $this->hasMany(Kemampuan::class, 'bahasa_pemograman_id', 'id');
    }
}
