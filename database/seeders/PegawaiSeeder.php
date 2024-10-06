<?php

namespace Database\Seeders;

use App\Models\Poh;
use App\Models\Agama;
use App\Models\Negara;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Keluarga;
use App\Models\Department;
use App\Models\Penempatan;
use App\Models\StatusAktiv;
use Faker\Factory as Faker;
use App\Models\GolonganDarah;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PegawaiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pegawais')->delete();

        $poh = Poh::pluck('id')->toArray();
        $dept = Department::pluck('id')->toArray();
        $gol = Golongan::pluck('id')->toArray();
        $status = StatusAktiv::pluck('id')->toArray();
        $penempatan = Penempatan::pluck('id')->toArray();
        $agama = Agama::pluck('id_agm')->toArray();
        $negara = Negara::pluck('id_ngr')->toArray();
        $golDarah = GolonganDarah::pluck('id_darah')->toArray();
        $keluarga = Keluarga::pluck('kdstatusk')->toArray();
        $desa = ['Desa A', 'Desa B', 'Desa C', 'Desa D', 'Desa E', 'Desa F'];
        $kecamatan = ['Kecamatan A', 'Kecamatan B', 'Kecamatan C', 'Kecamatan D', 'Kecamatan E', 'Kecamatan F'];
        $kelurahan = ['Kelurahan A', 'Kelurahan B', 'Kelurahan C', 'Kelurahan D', 'Kelurahan E', 'Kelurahan F'];

        for ($i = 0; $i < 10; $i++) {
            $faker = Faker::create('id_ID');
            $data = new Pegawai();
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $data->nip = $faker->numerify('############');
            $data->nik = $faker->numerify('###############');
            $data->nama = $faker->name($gender);
            $data->email =  'user' . $i . '@gmail.com';
            $data->password =  Hash::make('user' . $i . 'password');
            $data->username = 'user' . $i;
            $data->jenis_kelamin = $gender;
            $data->tmpt_lahir = $faker->city();
            $data->tgl_lahir = $faker->date();
            $data->nohp = $faker->phoneNumber();
            $data->alamat = $faker->address();
            $data->desa = $faker->randomElement($desa);
            $data->kelurahan = $faker->randomElement($kelurahan);
            $data->kecamatan = $faker->randomElement($kecamatan);
            $data->kota = $faker->city();
            $data->agama_id = $faker->randomElement($agama);
            $data->negara_id = $faker->randomElement($negara);
            $data->gol_darah_id = $faker->randomElement($golDarah);
            $data->skeluarga_id = $faker->randomElement($keluarga);
            $data->id_poh = $faker->randomElement($poh);
            $data->id_dept = $faker->randomElement($dept);
            $data->id_golongan = $faker->randomElement($gol);
            $data->id_statusaktiv = $faker->randomElement($status);
            $data->id_penempatan = $faker->randomElement($penempatan);
            $data->tgl_masuk = $faker->date();
            $data->tgl_keluar = date('Y-m-d', strtotime($data->tgl_masuk . '+1 year'));
            $data->save();
            $data->assignRole('user');
        }

        $admin = Pegawai::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'nik' => Faker::create('id_ID')->numerify('##########'),
            'nip' => Faker::create('id_ID')->numerify('############'),
            'jenis_kelamin' => 'Laki-laki',
            'tmpt_lahir' =>  Faker::create('id_ID')->city(),
            'tgl_lahir' =>  Faker::create('id_ID')->date(),
            'nohp' => Faker::create('id_ID')->phoneNumber(),
            'alamat' => Faker::create('id_ID')->address(),
            'desa' => Faker::create('id_ID')->randomElement($desa),
            'kelurahan' => Faker::create('id_ID')->randomElement($kelurahan),
            'kecamatan' => Faker::create('id_ID')->randomElement($kecamatan),
            'kota' =>  Faker::create('id_ID')->city(),
            'agama_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'negara_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'gol_darah_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'skeluarga_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'id_poh' => $faker->randomElement($poh),
            'id_dept' => $faker->randomElement($dept),
            'id_golongan' => $faker->randomElement($gol),
            'id_statusaktiv' => $faker->randomElement($status),
            'id_penempatan' => $faker->randomElement($penempatan),
            'tgl_masuk' =>  Faker::create('id_ID')->date(),
            'tgl_keluar' => date('Y-m-d', strtotime(Faker::create('id_ID')->date() . '+1 year')),

        ]);
        $admin->assignRole('Admin');

        $spv = Pegawai::create([
            'nama' => 'SPV',
            'username' => 'spv',
            'email' => 'spv@gmail.com',
            'password' => Hash::make('password'),
            'nip' => Faker::create('id_ID')->numerify('############'),
            'jenis_kelamin' => 'Laki-laki',
            'tmpt_lahir' =>  Faker::create('id_ID')->city(),
            'tgl_lahir' =>  Faker::create('id_ID')->date(),
            'nohp' => Faker::create('id_ID')->phoneNumber(),
            'alamat' => Faker::create('id_ID')->address(),
            'desa' => Faker::create('id_ID')->randomElement($desa),
            'kelurahan' => Faker::create('id_ID')->randomElement($kelurahan),
            'kecamatan' => Faker::create('id_ID')->randomElement($kecamatan),
            'kota' =>  Faker::create('id_ID')->city(),
            'agama_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'negara_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'gol_darah_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'skeluarga_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'id_poh' => $faker->randomElement($poh),
            'id_dept' => $faker->randomElement($dept),
            'id_golongan' => $faker->randomElement($gol),
            'id_statusaktiv' => $faker->randomElement($status),
            'id_penempatan' => $faker->randomElement($penempatan),
            'tgl_masuk' =>  Faker::create('id_ID')->date(),
            'tgl_keluar' => date('Y-m-d', strtotime(Faker::create('id_ID')->date() . '+1 year')),

        ]);
        $spv->assignRole('SPV');
    }
}

