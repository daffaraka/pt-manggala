<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use App\Models\Pegawai;
use App\Models\User;
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

        // dd($status_val);
        $data['status_lbl'] = $status_lbl;
        $data['status_val'] = $status_val;
        
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
