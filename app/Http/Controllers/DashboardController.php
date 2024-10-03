<?php

namespace App\Http\Controllers;

use App\Models\Poh;
use App\Models\User;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Keluarga;
use App\Models\Department;
use App\Models\Penempatan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $data['user'] = User::count();
        $data['jumlahpegawai'] = Pegawai::count();
        $data['pgw_aktiv'] = Pegawai::where('id_statusaktiv', '1')->count();
        $data['pgw_tidak_aktiv'] = Pegawai::where('id_statusaktiv', '2')->count();
        $data['pgw_lk'] = Pegawai::whereJenisKelamin('Laki-laki')->count();
        $data['pgw_pr'] = Pegawai::whereJenisKelamin('Perempuan')->count();
        $status = Keluarga::all();
        $status_lbl = [];
        $status_val = [];
        foreach ($status as $key => $value) {
            array_push($status_lbl, $value->nmstatusk);
            array_push($status_val, Pegawai::whereSkeluargaId($value->kdstatusk)->count());
        }


        $data['karyawan_perSite'] = Pegawai::with(['penempatans'])->get()->groupBy(function ($item) {
            return $item->penempatans->nama;
        })
            ->map(function ($statupenempatans, $statusName) {
                return [
                    'label' => $statusName,
                    'count' => $statupenempatans->count(),
                ];
            });

        $data['karyawan_perGolongan'] = Pegawai::with(['golongans'])->get()->groupBy(function ($item) {
            return $item->golongans->nama;
        })
            ->map(function ($golonganenempatans, $golonganName) {
                return [
                    'label' => $golonganName,
                    'count' => $golonganenempatans->count(),
                ];
            });



        $data['karyawan_perStatus'] = Pegawai::with(['statusaktivs'])->get()->groupBy(function ($item) {
            return $item->statusaktivs->nama;
        })
            ->map(function ($statusaktivs, $statusName) {
                return [
                    'label' => $statusName,
                    'count' => $statusaktivs->count(),
                ];
            });



        $data['persentase_departement'] = Penempatan::with('pegawais.departments')->get()->mapWithKeys(function ($penempatan) {
            // Menghitung jumlah pegawais per department dalam penempatan
            $departmentCounts = $penempatan->pegawais->groupBy('departments.nama')->map(function ($group) {
                return $group->count();
            })->toArray();

            return [$penempatan->nama => $departmentCounts];
        });


        // dd($status_val);
        $data['status_lbl'] = $status_lbl;
        $data['status_val'] = $status_val;

        // dd($data['karyawan_perGolongan']);
        return view('dashboard', $data);
    }

    public function chart()
    {
        $data['pgw_lk'] = Pegawai::whereJenisKelamin('Laki-laki')->count();
        $data['pgw_pr'] = Pegawai::whereJenisKelamin('Perempuan')->count();
        $status = Keluarga::all();
        $status_lbl = [];
        $status_val = [];

        $status_dept = [];
        foreach ($status as $key => $value) {
            array_push($status_lbl, $value->nmstatusk);
            array_push($status_val, Pegawai::whereSkeluargaId($value->kdstatusk)->count());

            array_push($status_dept, $value->id_dept);
        }

        // dd($data);
        $data['status_lbl'] = $status_lbl;
        $data['status_val'] = $status_val;

        $data['status_dept'] = $status_dept;

        return view('chart', $data);
    }
}
