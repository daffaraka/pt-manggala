<?php

namespace Database\Seeders;

use App\Models\Penempatan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PenempatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Penempatan = ['BAS','SLR','BP','GAM', 'PWK'];
        foreach ($Penempatan as $key => $value) {
            $data = new Penempatan();
            $data->nama = $value;
            $data->save();
        }
    }
}
