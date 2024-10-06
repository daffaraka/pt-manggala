@extends('layouts.admin')
@section('title')
    Edit Profile Pegawai
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-edit"></i> Edit Profile Pegawai</h1>
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
                        @include('flash')
                        <form action="{{ route('profile.update', ['id' => $user->id]) }}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label class="control-label col-md-3">NIK</label>
                                <div class="col-md-8">
                                    <input required class="form-control col-md-8" type="number" name="nip"
                                        value="{{ isset($user) ? $user->nip : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="nama"
                                        value="{{ isset($user) ? $user->nama : '' }}">
                                </div>
                            </div>


                            <div class="form-group row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="email" name="email"
                                        value="{{ isset($user) ? $user->email : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Username</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="text" name="username"
                                        value="{{ isset($user) ? $user->username : '' }}">
                                </div>
                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Password</label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="password" name="password" value=""
                                        placeholder="*******">

                                    @error('password')
                                        <div class="alert-danger alert-block p-3 mt-3">{{ $message }}</div>
                                    @enderror

                                </div>

                            </div>

                            <div class="form-group row">
                                <label class="control-label col-md-3">Konfirmasi Password </label>
                                <div class="col-md-8">
                                    <input required class="form-control" type="password" name="password_confirmation"
                                        value="" placeholder="*******">
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


                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
