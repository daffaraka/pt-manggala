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

        // Mencari data relasi berdasarkan nilai di kolom yang relevan
        $agama = Agama::where('nmagama', $row[15])->first(); // kolom agama
        $negara = Negara::where('nm_negara', $row[16])->first(); // kolom negara
        $golonganDarah = GolonganDarah::where('nama_gol_darah', $row[17])->first(); // kolom golongan darah
        $statusKeluarga = Keluarga::where('nmstatusk', $row[18])->first(); // kolom status keluarga
        $department = Department::where('nama', $row[19])->first(); // kolom departemen
        $penempatan = Penempatan::where('nama', $row[20])->first(); // kolom penempatan
        $poh = Poh::where('nama', $row[21])->first(); // kolom POH
        $golongan = Golongan::where('nama', $row[22])->first(); // kolom golongan
        $jenisKeluar = JenisKeluar::where('nama', $row[23])->first(); // kolom jenis keluar
        $statusAktiv = StatusAktiv::where('nama', $row[24])->first(); // kolom status aktiv

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
            'desa'            => $row[9],
            'kelurahan'       => $row[10],
            'kecamatan'       => $row[11],
            'kota'            => $row[12],
            'alamat'          => $row[13],
            'nohp'            => $row[14],
            'agama_id'        => $agama ? $agama->id_agm : null,
            'negara_id'       => $negara ? $negara->id_ngr : null,
            'gol_darah_id'    => $golonganDarah ? $golonganDarah->id_darah : null,
            'skeluarga_id'    => $statusKeluarga ? $statusKeluarga->kdstatusk : null,
            'id_dept'         => $department ? $department->id : null,
            'id_penempatan'   => $penempatan ? $penempatan->id : null,
            'id_poh'          => $poh ? $poh->id : null,
            'id_golongan'     => $golongan ? $golongan->id : null,
            'id_jeniskeluar'  => $jenisKeluar ? $jenisKeluar->id : null,
            'id_statusaktiv'  => $statusAktiv ? $statusAktiv->id : null,
            'dokumen_satu'    => $row[25],
            'dokumen_dua'     => $row[26],
            'dokumen_tiga'    => $row[27],
        ]);
    }
}
