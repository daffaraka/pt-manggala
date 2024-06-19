<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penempatan extends Model
{
    use HasFactory;


    /**
     * Get all of the pegawai for the Penempatan
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function pegawais()
    {
        return $this->hasMany(Pegawai::class,'id_penempatan');
    }
}
