<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $gol = ['Engineering','Produksi','Logistik','HSE', 'HCGA','Plant'];
        foreach ($gol as $key => $value) {
            $data = new Department();
            $data->nama = $value;
            $data->save();
        }
    }
}
