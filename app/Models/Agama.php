<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agama extends Model
{
    use HasFactory;

    protected $primarykey = 'id_agm';

    public function pegawais()
    {
        return $this->hasMany(Pegawai::class,'agama_id');
    }
}
