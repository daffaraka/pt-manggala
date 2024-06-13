@extends('layouts.admin')
@section('title')
    Dashboard
@endsection
@section('dashboard')
    active
@endsection
@section('content')
    <main class="app-content">
        <div class="app-title">
            <div>
                <h1><i class="fa fa-dashboard"></i> HCIS Dashboard</h1>
                <p>Dashboard Sistem Karyawan PT MANGGALA USAHA MANUNGGAL</p>
            </div>
            <ul class="app-breadcrumb breadcrumb">
                <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
                <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
            </ul>
        </div>


        <div class="row mb-3">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        User information
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">{{ Auth::user()->name }} - <button
                                class="btn btn-sm btn-info">{{ Auth::user()->roles->first()->name }} </button> </h5>
                            <hr>
                        <p class="card-text font-weight-bold">{{ Auth::user()->email }}</p>
                    </div>
                </div>
            </div>
        </div>

        @role(['Admin', 'SPV'])
            <div class="row">
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
                        <div class="info">
                            <h4>Export Excel</h4>
                            <a href="/exportexcel">Export Excel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-upload fa-3x"></i>
                        <div class="info">
                            <h4>Import Data</h4>
                            <p><b>{{ $user }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small info coloured-icon"><i class="icon fa fa-edit fa-3x"></i>
                        <div class="info">
                            <a href="{{ route('pegawai.create') }}" class="nav-item text-dark">
                                <h4>Tambah Pegawai</h4>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small warning coloured-icon"><i class="icon fa fa-files-o fa-3x"></i>
                        <div class="info">
                            <a href="{{ route('pegawai.index') }}" class="text-dark">
                                <h4>Data Pegawai</h4>
                            </a>

                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-download fa-3x"></i>
                        <div class="info">
                            <a href="{{ route('pegawai-pdf') }}">
                                <h4>Report Pegawai</h4>

                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                            <h7>Jumlah Pegawai</h7>
                            <p><b>{{ $jumlahpegawai }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                            <h7>Jumlah Pegawai Aktiv</h7>
                            <p><b>{{ $pgw_aktiv }}</b></p>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
                        <div class="info">
                            <h7>Jumlah Pegawai Tidak Aktiv</h7>
                            <p><b>{{ $pgw_tidak_aktiv }}</b></p>
                        </div>
                    </div>
                </div>
            </div>
        @endrole
        {{-- <div class="row"> --}}

        {{-- <div class="col-md-6 col-lg-3">
          <div class="widget-small primary coloured-icon"><i class="icon fa fa-users fa-3x"></i>
            <div class="info">
              <h4>User</h4>
              <p><b>{{ $user }}</b></p>
            </div>
          </div>
        </div> --}}
        <div class="row">
            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Pegawai Berdasarkan Status Pernikahan</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="barChartDemo"></canvas>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="tile">
                    <h3 class="tile-title">Pegawai Berdasarkan Jenis Kelamin</h3>
                    <div class="embed-responsive embed-responsive-16by9">
                        <canvas class="embed-responsive-item" id="pieChartDemo"></canvas>
                    </div>
                </div>
            </div>
        </div>
    @endsection
    @section('script')
        <script type="text/javascript">
            var data = {
                labels: {!! json_encode($status_lbl) !!},
                datasets: [{
                    label: "My First dataset",
                    fillColor: "rgba(220,220,220,0.2)",
                    strokeColor: "rgba(220,220,220,1)",
                    pointColor: "rgba(220,220,220,1)",
                    pointStrokeColor: "#fff",
                    pointHighlightFill: "#fff",
                    pointHighlightStroke: "rgba(220,220,220,1)",
                    data: {{ json_encode($status_val) }},
                    label: "Sudah Menikah"
                }, ]
            };
            var pdata = [{
                    value: {{ $pgw_lk }},
                    color: "#46BFBD",
                    highlight: "#5AD3D1",
                    label: "Laki-laki"
                },
                {
                    value: {{ $pgw_pr }},
                    color: "#F7464A",
                    highlight: "#FF5A5E",
                    label: "Perempuan"
                }
            ]

            var ctxb = $("#barChartDemo").get(0).getContext("2d");
            var barChart = new Chart(ctxb).Bar(data);
            var ctxp = $("#pieChartDemo").get(0).getContext("2d");
            var pieChart = new Chart(ctxp).Pie(pdata);
        </script>
    @endsection
