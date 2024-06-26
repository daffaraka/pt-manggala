<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Poh extends Model
{
    use HasFactory;

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class);
    }
}
