<?php

namespace Database\Seeders;

use App\Models\Golongan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GolonganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $st = ['I','II','III','IV','V','VI','VII','Eksekutif'];
        foreach ($st as $key => $value) {
            $data = new Golongan();
            $data->nama = $value;
            $data->save();
        }
    }
}
