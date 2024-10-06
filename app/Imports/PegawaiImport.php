<?php

namespace App\Imports;

use App\Models\Poh;
use App\Models\Agama;
use App\Models\Negara;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Keluarga;
use App\Models\Department;
use App\Models\Penempatan;
use App\Models\StatusAktiv;
use App\Models\GolonganDarah;
use App\Models\JenisKeluar;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;

class PegawaiImport implements ToModel, SkipsEmptyRows
{

    private $headerSkipped = false;


    public function model(array $row)
    {
        if (!$this->headerSkipped) {
            $this->headerSkipped = true;
            return null; // Skip the header row
        }

        // Mencari data relasi berdasarkan nilai di kolom yang relevan
        $agama = Agama::where('nmagama', $row[12])->first(); // kolom 11
        $negara = Negara::where('nm_negara', $row[13])->first(); // kolom 12
        $golonganDarah = GolonganDarah::where('nama_gol_darah', $row[14])->first(); // kolom 13
        $statusKeluarga = Keluarga::where('nmstatusk', $row[15])->first(); // kolom 14
        $department = Department::where('nama', $row[16])->first();
        $penempatan = Penempatan::where('nama', $row[17])->first();
        $poh = Poh::where('nama', $row[18])->first();
        $golongan = Golongan::where('nama', $row[19])->first();
        $jenisKeluar = JenisKeluar::where('nama', $row[20])->first(); // kolom 18
        $statusAktiv = StatusAktiv::where('nama', $row[21])->first(); // kolom 19

        // Membuat instance Pegawai dengan data yang diimport
        return new Pegawai([
            'nama'            => $row[1],
            'username'        => $row[2],
            'email'           => $row[3],
            'nip'             => $row[4],
            'nik'             => $row[5],
            'tmpt_lahir'      => $row[6],
            'tgl_lahir'       => $row[7],
            'jenis_kelamin'   => $row[8],
            'nohp'            => $row[9],
            'alamat'          => $row[10],
            'desa'            => $row[11],
            'agama_id'        => $agama ? $agama->id_agm : null,
            'negara_id'       => $negara ? $negara->id_ngr : null,
            'gol_darah_id'    => $golonganDarah ? $golonganDarah->id_darah : null,
            'skeluarga_id'    => $statusKeluarga ? $statusKeluarga->kdstatusk : null,
            'id_golongan'     => $golongan ? $golongan->id : null,
            'id_dept'         => $department ? $department->id : null,
            'id_penempatan'   => $penempatan ? $penempatan->id : null,
            'id_poh'          => $poh ? $poh->id : null,
            'id_jeniskeluar'  => $jenisKeluar ? $jenisKeluar->id : null,
            'id_statusaktiv'  => $statusAktiv ? $statusAktiv->id : null,
            'dokumen_satu'    => $row[22],
            'dokumen_dua'     => $row[23],
            'dokumen_tiga'    => $row[24],
        ]);
    }

}
