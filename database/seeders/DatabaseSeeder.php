<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
            PegawaiSeeder::class,
            AgamaSeeder::class,
            NegaraSeeder::class,
            GolonganDarahSeeder::class,
            KeluargaSeeder::class,
            PermissionSeeder::class,
            RoleSeeder::class,
            UserSeeder::class,

        ]);

    }
}
