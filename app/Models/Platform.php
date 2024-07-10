<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Platform extends Model
{
    use HasFactory;
    protected $table = 'platform';
    protected $primaryKey = 'id';

    public function TempatKerja()
    {
        return $this->hasMany(TempatKerja::class, 'platform_id', 'id');
    }
}
