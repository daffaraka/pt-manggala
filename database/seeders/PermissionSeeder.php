<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions =
            [
                'dashboard-beranda',
                'lihat-chart',

                'pegawai-beranda',
                'pegawai-create',
                'pegawai-edit',
                'pegawai-hapus',

                'agama-beranda',
                'agama-create',
                'agama-edit',
                'agama-hapus',

                'kewarganegaraan-beranda',
                'kewarganegaraan-create',
                'kewarganegaraan-edit',
                'kewarganegaraan-hapus',

                'goldar-beranda',
                'goldar-create',
                'goldar-edit',
                'goldar-hapus',

                'keluarga-beranda',
                'keluarga-create',
                'keluarga-edit',
                'keluarga-hapus',
            ];

            foreach ($permissions as $module => $permissions) {
                Permission::create([
                    'name' => $permissions,
                    'guard_name' => 'web',
                ]);
            }
    }
}
