@extends('layouts.admin')
@section('title')
    Detail Pegawai
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="div">
                <h1><i class="fa fa-laptop"></i> Detail Pegawai</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item"><a href="/pegawai">Data Pegawai</a></li>
                <li class="breadcrumb-item"><a href="#">Detail Pegawai</a></li>
            </ul>
        </div>
        <div class="tile">
            <div class="page-header">
                <div class="row">
                    <div class="col-md-12">
                        @if (isset($pegawai->foto))
                            <img src="{{ asset('berkas/pegawai/foto/' . $pegawai->foto) }}" class="shadow" width="auto"
                                height="260px" alt="">
                        @else
                            <img src="{{ asset('img/kimi.jpg') }}" width="180px" height="260" alt="">
                        @endif
                        <table class="table-condensed table-bordered  my-4">
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ $pegawai->nip }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: </td>
                                <td>{{ $pegawai->nama }}</td>
                            </tr>
                            <tr>
                                <td> Tempat, Tanggal Lahir</td>
                                <td>:</td>
                                <td>{{ $pegawai->tmpt_lahir }}, {{ $pegawai->tgl_lahir }}</td>
                            </tr>
                            <tr>
                                <td> Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ $pegawai->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td> Alamat</td>
                                <td>:</td>
                                <td>{{ $pegawai->alamat }}</td>
                            </tr>
                            <tr>
                                <td> Agama</td>
                                <td>:</td>
                                <td>{{ $pegawai->agama->nmagama ?? '' }}</td>
                            </tr>
                            <td> Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ $pegawai->negara->nm_negara ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Golongan Darah</td>
                            <td>:</td>
                            <td>{{ $pegawai->darah->nama_gol_darah ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Status</td>
                            <td>:</td>
                            <td>{{ $pegawai->keluarga->nmstatusk ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Nomor HP</td>
                            <td>:</td>
                            <td>{{ $pegawai->nohp }}</td>
                            </tr>
                            </tr>
                            <td> Nomor HP</td>
                            <td>:</td>
                            <td>{{ $pegawai->nik }}</td>
                            </tr>
                            </tr>
                            <td> Desa</td>
                            <td>:</td>
                            <td>{{ $pegawai->desa }}</td>
                            </tr>
                            </tr>
                            <td> Kecamatan</td>
                            <td>:</td>
                            <td>{{ $pegawai->kecamatan }}</td>
                            </tr>
                            </tr>
                            <td> Kabupaten/Kota</td>
                            <td>:</td>
                            <td>{{ $pegawai->kota }}</td>
                            </tr>
                            </tr>
                            <td> Tanggal Masuk</td>
                            <td>:</td>
                            <td>{{ $pegawai->tgl_masuk }}</td>
                            </tr>
                            </tr>
                            <td> Tanggal Keluar</td>
                            <td>:</td>
                            <td>{{ $pegawai->tgl_keluar }}</td>
                            </tr>
                            </tr>
                            <td> Catatan Keluar</td>
                            <td>:</td>
                            <td>{{ $pegawai->note_keluar }}</td>
                            </tr>
                            </tr>
                            <td> Nomor Rekening</td>
                            <td>:</td>
                            <td>{{ $pegawai->norek }}</td>
                            </tr>
                            </tr>
                            <td> Nomor Bank</td>
                            <td>:</td>
                            <td>{{ $pegawai->namabank }}</td>
                            </tr>
                            </tr>
                            <td> NIK</td>
                            <td>:</td>
                            <td>{{ $pegawai->nik }}</td>
                            </tr>

                        </table>
                    </div>
                </div>
            </div>
        </div>
        <a href="{{ url('/pegawai/' . $pegawai->id . '/pelatihan') }}" class="btn btn-primary"><span> Pelatihan</span></a>
        <a href="{{ url('/pegawai/' . $pegawai->id . '/pendidikan') }}" class="btn btn-primary"><span>
                Pendidikan</span></a>
        <a href="{{ url('/pegawai/' . $pegawai->id . '/pengalaman') }}" class="btn btn-primary"><span> Pengalaman
                Kerja</span></a>
    </main>
@endsection
