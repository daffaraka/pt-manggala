<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pegawai extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    protected $fillable =
    [
        'name',
        'username',
        'email',
        'password',
        'nip',
        'nik',
        'nama',
        'tmpt_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'alamat',
        'foto',
        'nohp',
        'agama_id',
        'negara_id',
        'gol_darah_id',
        'skeluarga_id',
        'id_poh',
        'id_dept',
        'id_golongan',
        'id_jeniskeluar',
        'id_statusaktiv',
        'dokumen_satu',
        'dokumen_dua',
        'dokumen_tiga'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    public function agama()
    {
        return $this->belongsTo(Agama::class, 'agama_id','id_agm');
    }
    public function negara()
    {
        return $this->belongsTo(Negara::class, 'negara_id', 'id_ngr');
    }
    public function darah()
    {
        return $this->belongsTo(GolonganDarah::class, 'gol_darah_id', 'id_darah');
    }
    public function keluarga()
    {
        return $this->belongsTo(Keluarga::class, 'skeluarga_id', 'kdstatusk');
    }

    public function pendidikan()
    {
        return $this->hasMany(Pendidikan::class, 'pegawai_id', 'id');
    }

    public function pelatihan()
    {
        return $this->hasMany(Pelatihan::class, 'pegawai_id', 'id');
    }

    public function pengalaman()
    {
        return $this->hasMany(Pengalaman::class, 'pegawai_id', 'id');
    }
    public function penempatans()
    {
        return $this->belongsTo(Penempatan::class, 'id_penempatan', 'id');
    }
    public function pohs()
    {
        return $this->belongsTo(Poh::class, 'id_poh');
    }
    public function departments()
    {
        return $this->belongsTo(Department::class, 'id_dept', 'id');
    }
    public function golongans()
    {
        return $this->belongsTo(Golongan::class, 'id_golongan', 'id');
    }
    public function jeniskeluars()
    {
        return $this->belongsTo(Golongan::class, 'id_jeniskeluar', 'id');
    }
    public function statusaktivs()
    {
        return $this->belongsTo(StatusAktiv::class, 'id_statusaktiv', 'id');
    }
}
