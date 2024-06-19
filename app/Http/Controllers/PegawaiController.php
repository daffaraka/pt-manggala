<?php

namespace App\Http\Controllers;

use PDF;
use App\Models\Poh;
use App\Models\Agama;
use App\Models\Negara;
use App\Models\Pegawai;
use App\Models\Golongan;
use App\Models\Keluarga;
use App\Models\Department;
use App\Models\Penempatan;
use App\Models\JenisKeluar;
use App\Models\StatusAktiv;
use Illuminate\Http\Request;
use App\Models\GolonganDarah;
use App\Exports\PegawaiExport;
use Illuminate\Support\Facades\File;
use Maatwebsite\Excel\Facades\Excel;

class PegawaiController extends Controller
{
    public function __construct()
    {
        $this->middleware(['role:Admin|SPV', 'permission:pegawai-beranda']);
    }
    public function index()
    {
        $pegawai = Pegawai::orderBy('nama', 'asc');
        if (request()->nama) {
            $pegawai = $pegawai->where('nama', 'like', '%' . request()->nama . '%');
        }
        if (request()->nip) {
            $pegawai = $pegawai->where('nip', 'like', '%' . request()->nip . '%');
        }
        $limit = 10;
        if (request()->limit) {
            $limit = request()->limit;
        }
        $pegawai = $pegawai->paginate($limit);
        return view('pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['agama'] = Agama::all();
        $data['negara'] = Negara::all();
        $data['darah'] = GolonganDarah::all();
        $data['keluarga'] = Keluarga::all();
        $data['penempatans'] = Penempatan::all();
        $data['pohs'] = Poh::all();
        $data['departments'] = Department::all();
        $data['golongans'] = Golongan::all();
        $data['jeniskeluars'] = JenisKeluar::all();
        $data['statusaktivs'] = StatusAktiv::all();

        return view('pegawai.create_edit', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        // dd($request->all());



        // File
        $requestFileFoto = $request->file('foto');
        $requestFile1 = $request->file('dokumen_satu');
        $requestFile2 = $request->file('dokumen_dua');
        $requestFile3 = $request->file('dokumen_tiga');

        $fileFoto = $request->file('foto')->getClientOriginalName();
        $fileDokumen1 = $request->file('dokumen_satu')->getClientOriginalName();
        $fileDokumen2 = $request->file('dokumen_dua')->getClientOriginalName();
        $fileDokumen3 = $request->file('dokumen_tiga')->getClientOriginalName();


        $fileFotoSaved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileFoto;
        $fileDok1Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen1;
        $fileDok2Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen2;
        $fileDok3Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen3;

        $requestFileFoto->move('berkas/pegawai/foto', $fileFotoSaved);
        $requestFile1->move('berkas/pegawai/dokumen_satu', $fileDok1Saved);
        $requestFile2->move('berkas/pegawai/dokumen_dua', $fileDok2Saved);
        $requestFile3->move('berkas/pegawai/dokumen_tiga', $fileDok3Saved);


        $pegawai = new Pegawai;
        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->tmpt_lahir = $request->tmpt_lahir;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->agama_id = $request->agama_id;
        $pegawai->negara_id = $request->negara_id;
        $pegawai->gol_darah_id = $request->gol_darah_id;
        $pegawai->skeluarga_id = $request->skeluarga_id;
        $pegawai->alamat = $request->alamat;
        $pegawai->foto = $fileFotoSaved;
        $pegawai->nohp = $request->nohp;

        $pegawai->nik = $request->nik;
        $pegawai->desa = $request->desa;
        $pegawai->kecamatan = $request->kecamatan;
        $pegawai->kabupaten = $request->kabupaten;
        $pegawai->id_penempatans = $request->id_penempatans;
        $pegawai->id_poh = $request->id_poh;
        $pegawai->id_dept = $request->id_dept;
        $pegawai->id_golongan = $request->id_golongan;
        $pegawai->id_jeniskeluar = $request->id_jeniskeluar;
        $pegawai->tgl_masuk = $request->tgl_masuk;
        $pegawai->tgl_keluar = $request->tgl_keluar;
        $pegawai->note_keluar = $request->note_keluar;
        $pegawai->id_statusaktiv = $request->id_statusaktiv;
        $pegawai->dokumen_satu = $fileDok1Saved;
        $pegawai->dokumen_dua = $fileDok2Saved;
        $pegawai->dokumen_tiga = $fileDok3Saved;
        $pegawai->norek = $request->norek;
        $pegawai->namabank = $request->namabank;


        $pegawai->agama_id = $request->agama_id;




        $pegawai->save();

        return redirect('pegawai')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function show(Pegawai $pegawai)
    {
        $pegawai->load('departments'); // Memuat relasi department dengan eager loading

        return view('pegawai.show', compact('pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function edit(Pegawai $pegawai)
    {
        $data['pegawai'] = $pegawai;
        $data['agama'] = Agama::all();
        $data['negara'] = Negara::all();
        $data['darah'] = GolonganDarah::all();
        $data['keluarga'] = Keluarga::all();



        $data['penempatans'] = Penempatan::all();
        $data['pohs'] = Poh::all();
        $data['departments'] = Department::all();
        $data['golongans'] = Golongan::all();
        $data['jeniskeluars'] = JenisKeluar::all();
        $data['statusaktivs'] = StatusAktiv::all();



        return view('pegawai.create_edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pegawai $pegawai)
    {
        // $pegawai = Pegawai::update($request->all());


        $requestFileFoto = $request->file('foto');
        $requestFile1 = $request->file('dokumen_satu');
        $requestFile2 = $request->file('dokumen_dua');
        $requestFile3 = $request->file('dokumen_tiga');


        if ($requestFileFoto) {
            $fileFoto = $request->file('foto')->getClientOriginalName();
            $fileFotoSaved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileFoto;

            if (File::exists('berkas/pegawai/foto/' . $pegawai->foto)) {
                File::delete('berkas/pegawai/foto/' . $pegawai->foto);
                $requestFileFoto->move('berkas/pegawai/foto/', $fileFotoSaved);
            } else {
                $requestFileFoto->move('berkas/pegawai/foto/', $fileFotoSaved);
            }
        } else {
            $fileFotoSaved = $pegawai->foto;
        }


        if ($requestFile1) {
            $fileDokumen1 = $request->file('dokumen_satu')->getClientOriginalName();
            $fileDok1Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen1;
            if ($requestFile1) {
                if (File::exists('berkas/pegawai/dokumen_satu/' . $pegawai->dokumen_satu)) {
                    File::delete('berkas/pegawai/dokumen_satu/' . $pegawai->dokumen_satu);
                    $requestFile1->move('berkas/pegawai/dokumen_satu/', $fileDok1Saved);
                } else {
                    $requestFile1->move('berkas/pegawai/dokumen_satu/', $fileDok1Saved);
                }
            }
        } else {
            $fileDok1Saved = $pegawai->dokumen_dua;
        }


        if ($requestFile2) {
            $fileDokumen2 = $request->file('dokumen_dua')->getClientOriginalName();
            $fileDok2Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen2;

            if ($requestFile2) {
                if (File::exists('berkas/pegawai/dokumen_dua/', $pegawai->dokumen_dua)) {
                    File::delete('berkas/pegawai/dokumen_dua/', $pegawai->dokumen_dua);
                    $requestFile2->move('berkas/pegawai/dokumen_dua/', $fileDok2Saved);
                } else {
                    $requestFile2->move('berkas/pegawai/dokumen_dua/', $fileDok2Saved);
                }
            }
        } else {
            $fileDok2Saved = $pegawai->dokumen_dua;
        }


        if ($requestFile3) {
            $fileDokumen3 = $request->file('dokumen_tiga')->getClientOriginalName();
            $fileDok3Saved = $request->nip . '-' . now()->format('Y-m-d_H-i-s') . '-' . $fileDokumen3;
            if ($requestFile3) {
                if (File::exists('berkas/pegawai/dokumen_tiga/', $pegawai->dokumen_tiga)) {
                    File::delete('berkas/pegawai/dokumen_tiga/', $pegawai->dokumen_tiga);
                    $requestFile3->move('berkas/pegawai/dokumen_tiga/', $fileDok3Saved);
                } else {
                    $requestFile3->move('berkas/pegawai/dokumen_tiga/', $fileDok3Saved);
                }
            }
        } else {
            $fileDok3Saved = $pegawai->dokumen_tiga;
        }



        $pegawai->nip = $request->nip;
        $pegawai->nama = $request->nama;
        $pegawai->tmpt_lahir = $request->tmpt_lahir;
        $pegawai->tgl_lahir = $request->tgl_lahir;
        $pegawai->jenis_kelamin = $request->jenis_kelamin;
        $pegawai->agama_id = $request->agama_id;
        $pegawai->negara_id = $request->negara_id;
        $pegawai->gol_darah_id = $request->gol_darah_id;
        $pegawai->skeluarga_id = $request->skeluarga_id;
        $pegawai->alamat = $request->alamat;
        $pegawai->foto = $fileFotoSaved;
        $pegawai->nohp = $request->nohp;

        $pegawai->nik = $request->nik;
        $pegawai->desa = $request->desa;
        $pegawai->kecamatan = $request->kecamatan;
        $pegawai->kabupaten = $request->kabupaten;
        $pegawai->id_penempatans = $request->id_penempatans;
        $pegawai->id_poh = $request->id_poh;
        $pegawai->id_dept = $request->id_dept;
        $pegawai->id_golongan = $request->id_golongan;
        $pegawai->id_jeniskeluar = $request->id_jeniskeluar;
        $pegawai->tgl_masuk = $request->tgl_masuk;
        $pegawai->tgl_keluar = $request->tgl_keluar;
        $pegawai->note_keluar = $request->note_keluar;
        $pegawai->id_statusaktiv = $request->id_statusaktiv;
        $pegawai->dokumen_satu = $fileDok1Saved;
        $pegawai->dokumen_dua = $fileDok2Saved;
        $pegawai->dokumen_tiga = $fileDok3Saved;
        $pegawai->norek = $request->norek;
        $pegawai->namabank = $request->namabank;

        $pegawai->save();


        return redirect('pegawai')->with('success', 'Data berhasil disimpan');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pegawai  $pegawai
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pegawai $pegawai)
    {
        $pegawai->delete();
        return back()->with('error', 'Data berhasil dihapus');
    }

    public function pdf()
    {
        $pegawai = Pegawai::all();
        $pdf = PDF::loadView('pegawai.pdf', ['pegawai' => $pegawai]);
        return $pdf->download('pegawai.pdf');
    }
    public function uploadproduct($id)
    {
    }
    // public function chartByDepartment()
    // {
    // // Ambil data jumlah pegawai berdasarkan departemen
    // $departments = Department::withCount('pegawais')->get();

    // // Persiapkan data untuk Chart.js
    // $departmentLabels = $departments->pluck('name'); // Label departemen
    // $pegawaiCount = $departments->pluck('pegawais_count'); // Jumlah pegawai per departemen

    // // Render chart
    // return view('pegawai.chart', compact('departmentLabels', 'pegawaiCount'));
    // }

    public function exportexcel()
    {
        return Excel::download(new PegawaiExport, 'datapegawai.xlsx');
    }
    public function tampilfoto($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.tampilfoto', compact('pegawai'));
    }
    public function hapusfoto($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->foto) {
            $file_path = public_path('dokumenpegawaitiga/' . $pegawai->foto);

            if (file_exists($file_path)) {
                unlink($file_path); // Menghapus file foto dari direktori
            }

            $pegawai->foto = null;
            $pegawai->save();
        }

        return redirect()->route('tampilfoto', $pegawai->id)->with('success', 'Foto berhasil dihapus');
    }

    public function tampildokumensatu($id)
    {
        $pegawai = Pegawai::findOrFail($id);
        return view('pegawai.dokumensatu', compact('pegawai'));
    }


    public function hapusdokumensatu($id)
    {
        $pegawai = Pegawai::findOrFail($id);

        if ($pegawai->dokumen_satu) {
            $file_path = public_path('dokumensatu/' . $pegawai->dokumen_satu);

            if (file_exists($file_path)) {
                unlink($file_path); // Menghapus file foto dari direktori
            }

            $pegawai->dokumen_satu = null;
            $pegawai->save();
        }

        return redirect()->route('tampildokumensatu', $pegawai->id)->with('success', 'dokumen satu berhasil dihapus');
    }
}
