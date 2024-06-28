<?php

namespace App\Imports;

use App\Models\Poh;
use App\Models\Agama;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Department;
use App\Models\Penempatan;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\SkipsEmptyRows;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\ToCollection;

class PegawaiImport implements ToModel, SkipsEmptyRows
{

    private $headerSkipped = false;


    public function model(array $row)
    {
        if (!$this->headerSkipped) {
            $this->headerSkipped = true;
            return null;
        }

        $golongan = Golongan::where('nama', $row[2])->first();
        $department = Department::where('nama', $row[3])->first();
        $penempatan = Penempatan::where('nama', $row[4])->first();
        $poh = Poh::where('nama', $row[5])->first();
        $agama = Agama::where('nmagama', $row[8])->first();

        return new Pegawai([
            'nama'     => $row[1],
            'id_golongan'    => $golongan ? $golongan->id : null,
            'id_dept' =>  $department ? $department->id : null,
            'id_penempatan' => $penempatan ? $penempatan->id : null,
            'id_poh' => $poh ? $poh->id : null,
            'tmpt_lahir' => $row[6],
            'tgl_lahir' => $row[7],
            'agama_id' => $agama ? $agama->id : null,
            'jenis_kelamin' => $row[9],
            'nip' => $row[10]
        ]);
    }
}
