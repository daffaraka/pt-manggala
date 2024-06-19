<?php

namespace Database\Seeders;

use App\Models\StatusAktiv;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusAktifSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poh = ['Aktif', 'Tidak Aktif'];
        foreach ($poh as $key => $value) {
            $data = new StatusAktiv();
            $data->nama = $value;
            $data->save();
        }
    }
}
