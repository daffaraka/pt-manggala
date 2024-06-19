<?php

namespace App\Imports;

use App\Models\Pegawai;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class PegawaiImport implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        return new Pegawai([
            'NIP'     => $row[0],
            'email'    => $row[1],
        ]);
    }
}
