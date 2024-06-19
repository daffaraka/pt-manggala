<?php

namespace Database\Seeders;

use App\Models\JenisKeluar;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKeluarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $jk = [
            'Karyawan/ti Meninggal Dunia',
            'Karyawan/ti Menundurkan Diri',
            'Karyawan/ti Masa Perjanjian Kerja Untuk Waktu Tertentu',
            'Reorganisasi Perusahaan',
            'Karyawan/ti Tidak Memenuhi Syarat Pada Waktu Percobaan',
            'Karyawan/ti Tidak Memenuhi Prestasi Kerja Yang Ditetapkan Perusahaan',
            'Karyawan/ti Tidak Mampu Bekerja Karena Alasan Kesehatan',
            'Karyawan/ti Melakukan Kesalahan Berat atau Berulang',
            'Karyawan/ti Ditahan Pihak Yang Berwajib',
            'Karyawan/ti Memasuki Masa Pensiun/Lanjut Usia',
            'Pemberi Pekerjaan Mengurangi Sebagian Volume Pekerjaan dan Atau Seluruh Pekerjaan Kepada Perusahaan Lain',
        ];
        foreach ($jk as $key => $value) {
            $data = new JenisKeluar();
            $data->nama = $value;
            $data->save();
        }
    }
}
