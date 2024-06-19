@extends('layouts.admin')
@section('title')
    {{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> {{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item"><a href="#">{{ isset($pegawai) ? 'Edit' : 'Tambah' }} Pegawai</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="tile">
                    <div class="tile-body">
                        @if (isset($pegawai))
                            <form class="form-horizontal" action="{{ route('pegawai.update', $pegawai->id) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                {{ method_field('PUT') }}
                            @else
                                <form class="form-horizontal" action="{{ route('pegawai.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    {{ csrf_field() }}
                        @endif
                        @php
                            // dd($pegawai)
                        @endphp
                        <div class="form-group row">
                            <label class="control-label col-md-3">NIK</label>
                            <div class="col-md-8">
                                <input required class="form-control col-md-8" type="number" name="nip"
                                    value="{{ isset($pegawai) ? $pegawai->nip : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">NIP</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="number" name="nik"
                                    value="{{ isset($pegawai) ? $pegawai->nik : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nama</label>
                            <div class="col-md-8">
                                <input required class="form-control" type="text" name="nama"
                                    value="{{ isset($pegawai) ? $pegawai->nama : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tempat Lahir</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="tmpt_lahir"
                                    value="{{ isset($pegawai) ? $pegawai->tmpt_lahir : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tanggal Lahir</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="date" name="tgl_lahir"
                                    value="{{ isset($pegawai) ? $pegawai->tgl_lahir : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Alamat</label>
                            <div class="col-md-8">
                                <textarea class="form-control" rows="4" name="alamat">{{ isset($pegawai) ? $pegawai->alamat : '' }}</textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Desa</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="desa"
                                    value="{{ isset($pegawai) ? $pegawai->desa : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Kecamatan</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="kecamatan"
                                    value="{{ isset($pegawai) ? $pegawai->kecamatan : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Kabupaten</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="kabupaten"
                                    value="{{ isset($pegawai) ? $pegawai->kabupaten : '' }}">
                            </div>
                        </div>
                        {{-- <div class="form-group row">
              <label class="control-label col-md-3">Provinsi</label>
              <div class="col-md-8">
                <input   class="form-control col-md-8" type="text" name="provinsi" value="{{isset($pegawai) ? $pegawai->provinsi : ''}}">
              </div>
            </div> --}}
                        <div class="form-group row">
                            <label class="control-label col-md-3">Jenis Kelamin</label>
                            <div class="col-md-9">
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" class="sr-only" name="jenis_kelamin"
                                            value="Laki-laki"
                                            {{ isset($pegawai) && $pegawai->jenis_kelamin == 'Laki-laki' ? 'checked' : '' }}>Laki-laki
                                    </label>
                                </div>
                                <div class="form-check">
                                    <label class="form-check-label">
                                        <input class="form-check-input" type="radio" class="sr-only" name="jenis_kelamin"
                                            value="Perempuan"
                                            {{ isset($pegawai) && $pegawai->jenis_kelamin == 'Perempuan' ? 'checked' : '' }}>Perempuan
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Agama</label>
                            <div class="col-md-8">
                                <select class="form-control" name="agama_id" id="exampleSelect1">
                                    <option value="">Pilih Agama</option>
                                    @foreach ($agama as $tampil)
                                        <option @if (isset($pegawai) && $pegawai->agama_id == $tampil->id_agm) selected @endif
                                            value="{{ $tampil->id_agm }}">{{ $tampil->nmagama }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="control-label col-md-3">Penempatan Site</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_penempatans" id="id_penempatans">
                                    <option value="">Pilih Site</option>
                                    @foreach ($penempatans as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_penempatans', $pegawai->id_penempatans ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">POH</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_poh" id="id_poh">
                                    <option value="">Pilih POH</option>
                                    @foreach ($pohs as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_poh', $pegawai->id_poh ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Departement</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_dept" id="id_dept">
                                    <option value="">Pilih Department</option>
                                    @foreach ($departments as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_dept', $pegawai->id_dept ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Golongan</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_golongan" id="id_golongan">
                                    <option value="">Pilih Golongan</option>
                                    @foreach ($golongans as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_golongan', $pegawai->id_golongan ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tanggal Masuk Kerja</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="date" name="tgl_masuk"
                                    value="{{ isset($pegawai) ? $pegawai->tgl_masuk : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Tanggal Keluar Kerja</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="date" name="tgl_keluar"
                                    value="{{ isset($pegawai) ? $pegawai->tgl_keluar : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Jenis Keluar</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_jeniskeluar" id="id_jeniskeluar">
                                    <option value="">Pilih Jenis Keluar</option>
                                    @foreach ($jeniskeluars as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_jeniskeluar', $pegawai->id_jeniskeluar ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Notes alasan keluar </label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="note_keluar"
                                    value="{{ isset($pegawai) ? $pegawai->note_keluar : '' }}">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">STATUS PEGAWAI</label>
                            <div class="col-md-8">
                                <select class="form-control" name="id_statusaktiv" id="id_statusaktiv">
                                    <option value="">Pilih Status Pegawai</option>
                                    @foreach ($statusaktivs as $item)
                                        <option value="{{ $item->id }}"
                                            {{ old('id_statusaktiv', $pegawai->id_statusaktiv ?? '') == $item->id ? 'selected' : '' }}>
                                            {{ $item->nama }}
                                        </option>
                                    @endforeach

                                    {{-- @foreach ($agama as $tampil)
                            <option @if (isset($pegawai) && $pegawai->agama_id == $tampil->id_agm) selected @endif value="{{$tampil->id_agm}}">{{$tampil->nmagama}}</option>
                            @endforeach                            --}}
                                </select>
                            </div>
                        </div>




                        <div class="form-group row">
                            <label class="control-label col-md-3">Kewarganegaraan</label>
                            <div class="col-md-8">
                                <select class="form-control" name="negara_id" id="exampleSelect1">
                                    <option value="">Pilih Negara</option>
                                    @foreach ($negara as $tampil)
                                        <option @if (isset($pegawai) && $pegawai->negara_id == $tampil->id_ngr) selected @endif
                                            value="{{ $tampil->id_ngr }}">{{ $tampil->nm_negara }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Golongan Darah</label>
                            <div class="col-md-8">
                                <select class="form-control" name="gol_darah_id" id="exampleSelect1">
                                    <option value="">Pilih Golongan Darah</option>
                                    @foreach ($darah as $tampil)
                                        <option @if (isset($pegawai) && $pegawai->gol_darah_id == $tampil->id_darah) selected @endif
                                            value="{{ $tampil->id_darah }}">{{ $tampil->nama_gol_darah }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Status</label>
                            <div class="col-md-8">
                                <select class="form-control" name="skeluarga_id" id="exampleSelect1">
                                    <option value="">Pilih Status Keluarga</option>
                                    @foreach ($keluarga as $tampil)
                                        <option @if (isset($pegawai) && $pegawai->skeluarga_id == $tampil->kdstatusk) selected @endif
                                            value="{{ $tampil->kdstatusk }}">{{ $tampil->nmstatusk }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Foto</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" id="selectImage" src="#" alt="preview image"
                                    type="file" accept="image/*" name="foto"
                                    value="{{ isset($pegawai) ? $pegawai->foto : '' }}">

                                <div class="my-3">
                                    <img id="preview" src="#" alt="preview image" class="shadow"
                                        style=" max-height: 200px;" />

                                </div>
                                {{-- <a href="/tampilfoto">View Foto</a>
                    <img src="{{asset('dokumenpegawaitiga/'.$pegawai->foto)}}" alt="" width="50px" height="50px"> --}}
                                @if (isset($pegawai) && $pegawai->foto)
                                    <a href="{{ route('tampilfoto', $pegawai->id) }}" class="btn btn-primary mt-2">Lihat
                                        Foto</a>
                                    <img src="{{ asset('berkas/pegawai/foto/' . $pegawai->foto) }}" alt="Foto"
                                        width="50px" height="50px" class="mt-2">
                                @endif

                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Dokumen Satu PDF</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="file" accept="application/pdf"
                                    name="dokumen_satu" value="{{ isset($pegawai) ? $pegawai->dokumen_satu : '' }}">
                                @if (isset($pegawai) && $pegawai->dokumen_satu)
                                    <a href="{{ asset('berkas/pegawai/dokumen_satu/' . $pegawai->dokumen_satu) }}"
                                        class="btn btn-primary mt-2">Lihat Dokumen</a>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="control-label col-md-3">Dokumen Dua PDF</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="file" accept="application/pdf"
                                    name="dokumen_dua" value="{{ isset($pegawai) ? $pegawai->dokumen_dua : '' }}">
                                @if (isset($pegawai) && $pegawai->dokumen_dua)
                                    <a href="{{ asset('berkas/pegawai/dokumen_dua/' . $pegawai->dokumen_dua) }}"
                                        class="btn btn-primary mt-2">Lihat Dokumen</a>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="control-label col-md-3">Dokumen Tiga PDF</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="file" accept="application/pdf"
                                    name="dokumen_tiga" value="{{ isset($pegawai) ? $pegawai->dokumen_tiga : '' }}">
                                @if (isset($pegawai) && $pegawai->dokumen_tiga)
                                    <a href="{{ asset('berkas/pegawai/dokumen_tiga/' . $pegawai->dokumen_tiga) }}"
                                        class="btn btn-primary mt-2">Lihat Dokumen</a>
                                @endif
                            </div>
                        </div>



                        <div class="form-group row">
                            <label class="control-label col-md-3">No Rekening</label>
                            <div class="col-md-8">

                                <input class="form-control col-md-8" type="number" name="norek"
                                    value="{{ isset($pegawai) ? $pegawai->norek : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nama Bank</label>
                            <div class="col-md-8">
                                <input class="form-control col-md-8" type="text" name="namabank"
                                    value="{{ isset($pegawai) ? $pegawai->namabank : '' }}">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="control-label col-md-3">Nomor HP</label>
                            <div class="col-md-8">
                                <input class="form-control" type="text" name="nohp"
                                    value="{{ isset($pegawai) ? $pegawai->nohp : '' }}">
                            </div>
                        </div>


                    </div>

                    <div class="tile-footer">
                        <div class="row">
                            <div class="col-md-8 col-md-offset-3">
                                <button class="btn btn-primary" type="submit"><i
                                        class="fa fa-fw fa-lg fa-check-circle"></i>Simpan</button>
                                <a class="btn btn-secondary" href="#"><i
                                        class="fa fa-fw fa-lg fa-times-circle"></i>Kembali</a>
                            </div>

                        </div>

                    </div>
                    </form>
                </div>
            </div>
        </div>
    </main>


    <script>
        selectImage.onchange = evt => {
            preview = document.getElementById('preview');
            preview.style.display = 'block';
            const [file] = selectImage.files
            if (file) {
                preview.src = URL.createObjectURL(file)
            }
        }
    </script>
@endsection
