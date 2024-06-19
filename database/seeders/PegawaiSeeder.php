<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Golongan;
use App\Models\Pegawai;
use App\Models\Penempatan;
use App\Models\Poh;
use App\Models\StatusAktiv;
use Faker\Factory as Faker;
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
        $dept =Department::pluck('id')->toArray();
        $gol = Golongan::pluck('id')->toArray();
        $status = StatusAktiv::pluck('id')->toArray();
        $penempatan =Penempatan::pluck('id')->toArray();


        for ($i = 0; $i < 50; $i++) {
            $faker = Faker::create('id_ID');
            $data = new Pegawai();
            $gender = $faker->randomElement(['Laki-laki', 'Perempuan']);
            $data->nip = $faker->numerify('############');
            $data->nama = $faker->name($gender);
            $data->email =  'user'.$i.'@gmail.com';
            $data->password =  Hash::make('user'.$i.'password');
            $data->username = 'user'.$i;
            $data->jenis_kelamin = $gender;
            $data->tmpt_lahir = $faker->city();
            $data->tgl_lahir = $faker->date();
            $data->nohp = $faker->phoneNumber();
            $data->alamat = $faker->address();
            $data->agama_id = $faker->randomElement(['1', '2', '3', '4']);
            $data->negara_id = $faker->randomElement(['1', '2', '3', '4']);
            $data->gol_darah_id = $faker->randomElement(['1', '2', '3', '4']);
            $data->skeluarga_id = $faker->randomElement(['1', '2', '3', '4']);
            $data->id_poh = $faker->randomElement($poh);
            $data->id_dept = $faker->randomElement($dept);
            $data->id_golongan = $faker->randomElement($gol);
            $data->id_statusaktiv = $faker->randomElement($status);
            $data->id_penempatan = $faker->randomElement($penempatan);
            $data->save();
            $data->assignRole('user');
        }




        $admin = Pegawai::create([
            'nama' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('password'),
            'nip' => Faker::create('id_ID')->numerify('############'),
            'jenis_kelamin' => 'Laki-laki',
            'tmpt_lahir' =>  Faker::create('id_ID')->city(),
            'tgl_lahir' =>  Faker::create('id_ID')->date(),
            'nohp' => Faker::create('id_ID')->phoneNumber(),
            'alamat' => Faker::create('id_ID')->address(),
            'agama_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'negara_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'gol_darah_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'skeluarga_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'id_poh' => $faker->randomElement($poh),
            'id_dept' => $faker->randomElement($dept),
            'id_golongan' => $faker->randomElement($gol),
            'id_statusaktiv' => $faker->randomElement($status),
            'id_penempatan' => $faker->randomElement($penempatan),

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
            'agama_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'negara_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'gol_darah_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'skeluarga_id' => Faker::create('id_ID')->randomElement(['1', '2', '3', '4']),
            'id_poh' => $faker->randomElement($poh),
            'id_dept' => $faker->randomElement($dept),
            'id_golongan' => $faker->randomElement($gol),
            'id_statusaktiv' => $faker->randomElement($status),
            'id_penempatan' => $faker->randomElement($penempatan),


        ]);
        $spv->assignRole('SPV');



    }
}
