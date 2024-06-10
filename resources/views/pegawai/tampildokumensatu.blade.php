<!DOCTYPE html>
<html>
<head>
    <title>Lihat Dokumen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Dokumen Satu</h1>
        <div class="card mx-auto" style="width: 18rem;">
            @if (isset($pegawai) && $pegawai->dokumen_satu)
                <div class="embed-responsive embed-responsive-4by3">
                    <iframe class="embed-responsive-item" src="{{ route('tampildokumensatu', $pegawai->id) }}" frameborder="0"></iframe>
                </div>
            @else
                <p class="text-center">Dokumen satu tidak tersedia.</p>
            @endif
            <div class="card-body">
                <h5 class="card-title">{{ isset($pegawai) ? $pegawai->nama : '' }}</h5>
                <p class="card-text">NIP: {{ isset($pegawai) ? $pegawai->nip : '' }}</p>
                <a href="{{ route('pegawai.index') }}" class="btn btn-primary">Kembali ke Daftar</a>
            </div>
        </div>
    </div>
</body>
</html>
