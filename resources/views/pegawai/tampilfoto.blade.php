<!DOCTYPE html>
<html>
<head>
    <title>Lihat Foto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Foto Pegawai</h1>
        <div class="card mx-auto" style="width: 40rem;">
            @if ($pegawai->foto)
                <img class="card-img-top" src="{{ asset('dokumenpegawaitiga/' . $pegawai->foto) }}" alt="Foto Pegawai">
                <div class="d-flex justify-content-center mt-2">
                    <form action="{{ route('hapusfoto', $pegawai->id) }}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Hapus Foto</button>
                    </form>
                </div>
            @else
                <p class="text-center">Tidak ada foto tersedia.</p>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ $pegawai->nama }}</h5>
                <p class="card-text">NIP: {{ $pegawai->nip }}</p>
                <div class="d-flex justify-content-center mt-2">
                <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
            </div>
            </div>
        </div>
    </div>
</body>
</html>
