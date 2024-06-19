<?php

namespace Database\Seeders;

use App\Models\Poh;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PoHSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $poh = ['Palembang','Tangerang','Muara Enim','Lahat', 'Jakarta','Samarinda','Serpong'];
        foreach ($poh as $key => $value) {
            $data = new Poh();
            $data->nama = $value;
            $data->save();
        }
    }
}
