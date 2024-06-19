<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Golongan;
use App\Models\StatusAktiv;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AgamaSeeder::class,
            NegaraSeeder::class,
            GolonganDarahSeeder::class,
            GolonganSeeder::class,
            PendidikanSeeder::class,
            PelatihanSeeder::class,
            PenempatanSeeder::class,
            KeluargaSeeder::class,
            DepartmentSeeder::class,
            JenisKeluarSeeder::class,
            PoHSeeder::class,
            StatusAktifSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            PegawaiSeeder::class,
            // UserSeeder::class,

        ]);

    }
}
