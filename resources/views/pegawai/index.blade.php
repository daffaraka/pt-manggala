@extends('layouts.admin')
@section('title')
    Data Pegawai
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div class="div">
                <h1><i class="fa fa-laptop"></i> Data Pegawai</h1>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item">Pegawai</li>
                <li class="breadcrumb-item"><a href="#">Data Pegawai</a></li>
            </ul>
        </div>
        <div class="tile mb-4">
            <div class="page-header">
                <div class="row">
                    <div class="col-lg-12">
                        <form action="" class="form-inline" method="get">
                            <input type="text" name="nama" class="form-control mb-2 mr-2"
                                value="{{ request()->nama }}" placeholder="Cari Nama Pegawai">
                            <input type="text" name="nip" class="form-control mb-2 mr-2" value="{{ request()->nip }}"
                                placeholder="Cari NIP Pegawai">
                            <select name="limit" class="form-control mb-2 mr-2">
                                <option @if (request()->limit == 10) selected @endif>10</option>
                                <option @if (request()->limit == 20) selected @endif>20</option>
                                <option @if (request()->limit == 50) selected @endif>50</option>
                                <option @if (request()->limit == 100) selected @endif>100</option>
                                <option @if (request()->limit == 500) selected @endif>500</option>
                            </select>
                            <button type="submit" class="btn btn-info mb-2"><i class="fa fa-search"></i></button>
                            <!-- Button trigger modal -->
                            {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                    Launch demo modal
                  </button>

                  <!-- Modal -->
                  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          ...
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                          <button type="button" class="btn btn-primary">Save changes</button>
                        </div>
                      </div>
                    </div>
                  </div> --}}
                        </form>
                        {{-- <div class="col-auto mt-2 mb-2">
                  <a href="/datapegawai-pdf" target = "_blank"class="btn btn-info">Export PDF</a>
                  </div>
                <div class="col-auto mt-2 mb-2">
                  <a href="/exportexcell" target = "_blank"class="btn btn-success">Export Excell</a>
                  </div>
                  <div class="col-auto mt-2 mb-2">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                      Import Data Excell
                    </button>
                    </div> --}}
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>NIP</th>
                                    <th>Nama</th>
                                    <th>TTL</th>
                                    <th>JK</th>
                                    <th>No. Telp</th>
                                    <th>More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no =
                                        1 +
                                        (request()->limit ? intval(request()->limit) : 10) *
                                            ((request()->page ? intval(request()->page) : 1) - 1);
                                @endphp
                                @foreach ($pegawai as $tampil)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>
                                            @if (isset($tampil->foto))
                                                <img src="{{ asset('berkas/pegawai/foto/' . $tampil->foto) }}" alt=""
                                                    width="50px" height="50px">
                                            @else
                                                <img src="{{ asset('img/pegawai.png') }}" alt="" width="50px"
                                                    height="50px">
                                            @endif
                                        </td>
                                        <td>{{ $tampil->nip }}</td>
                                        <td>
                                            @if ($tampil->nama == Auth::user()->name)
                                            <a href="{{ route('pegawai.show', $tampil->id) }}">{{ $tampil->nama }}</a></td>

                                            @else
                                            <p>{{ $tampil->nama }}</p></td>

                                            @endif
                                        <td>{{ $tampil->tmpt_lahir }},
                                            {{ Carbon\Carbon::parse($tampil->tgl_lahir)->isoFormat('DD MMMM Y') }}</td>
                                        <td>{{ $tampil->jenis_kelamin }}</td>
                                        <td>{{ $tampil->nohp }}</td>
                                        <td>
                                            <a href="{{ url('/pegawai/' . $tampil->id . '/edit') }}" class="btn btn-info"><span
                                                    class="fa fa-edit (alias)"></span></a>

                                        </td>
                                        <td>
                                            <button class="btn btn-danger btn_modal_hapus" type="button"
                                                data-url="{{ route('pegawai.destroy', $tampil->id) }}"><span
                                                    class="fa fa-trash"></span></button>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        {{ $pegawai->appends(request()->all())->links('pagination::bootstrap-4') }}
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
