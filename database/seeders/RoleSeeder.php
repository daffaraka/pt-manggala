<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create(['name' => 'Admin']);
        Role::create(['name' => 'SPV']);
        Role::create(['name' => 'User']);



        $AdminPermissions =
        [
            'dashboard-beranda',
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


        $SpvPermissions =
        [
            'dashboard-beranda',
            'pegawai-beranda',

            'agama-beranda',

            'kewarganegaraan-beranda',

            'goldar-beranda',

            'keluarga-beranda',
        ];


        $UserPermissions =
        [
            'dashboard-beranda',
        ];


        $adminRole = Role::where('name', 'Admin')->first();
        $adminRole->syncPermissions($AdminPermissions);


        $spvRole = Role::where('name', 'SPV')->first();
        $spvRole->syncPermissions($SpvPermissions);


        $userRole = Role::where('name', 'User')->first();
        $userRole->syncPermissions($UserPermissions);
    }
}
