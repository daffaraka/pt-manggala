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
                        <h5 class="card-title">{{ Auth::user()->nama }} - <button
                                class="btn btn-sm btn-info">{{ Auth::user()->roles->first()->name }} </button> </h5>
                        <hr>
                        <p class="card-text font-weight-bold">{{ Auth::user()->email }}</p>
                        @if (isset(Auth::user()->foto))
                            <img src="{{ asset('berkas/pegawai/foto/' . Auth::user()->foto) }}" class="shadow"
                                width="auto" height="260px" alt="">
                        @else
                            <img src="{{ asset('img/kimi.jpg') }}" width="180px" height="260" alt="">
                        @endif
                        <table class="table-condensed table-bordered  my-4">
                            <tr>
                                <td>NIP</td>
                                <td>:</td>
                                <td>{{ Auth::user()->nip }}</td>
                            </tr>
                            <tr>
                                <td>Nama</td>
                                <td>: </td>
                                <td>{{ Auth::user()->nama }}</td>
                            </tr>
                            <tr>
                                <td> Site</td>
                                <td>:</td>
                                <td>{{ Auth::user()->penempatans->nama }}</td>
                            </tr>
                            <tr>
                                <td> Jenis Kelamin</td>
                                <td>:</td>
                                <td>{{ Auth::user()->jenis_kelamin }}</td>
                            </tr>
                            <tr>
                                <td> Alamat</td>
                                <td>:</td>
                                <td>{{ Auth::user()->alamat }}</td>
                            </tr>
                            <tr>
                                <td> Agama</td>
                                <td>:</td>
                                <td>{{ Auth::user()->agama->nmagama ?? '' }}</td>
                            </tr>
                            <td> Kewarganegaraan</td>
                            <td>:</td>
                            <td>{{ Auth::user()->negara->nm_negara ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Golongan Darah</td>
                            <td>:</td>
                            <td>{{ Auth::user()->darah->nama_gol_darah ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Status</td>
                            <td>:</td>
                            <td>{{ Auth::user()->keluarga->nmstatusk ?? '' }}</td>
                            </tr>
                            </tr>
                            <td> Nomor HP</td>
                            <td>:</td>
                            <td>{{ Auth::user()->nohp }}</td>
                            </tr>
                            </tr>
                            <td> Nomor HP</td>
                            <td>:</td>
                            <td>{{ Auth::user()->nik }}</td>
                            </tr>
                            </tr>
                            <td> Desa</td>
                            <td>:</td>
                            <td>{{ Auth::user()->desa }}</td>
                            </tr>
                            </tr>
                            <td> Kecamatan</td>
                            <td>:</td>
                            <td>{{ Auth::user()->kecamatan }}</td>
                            </tr>
                            </tr>
                            <td> Kabupaten</td>
                            <td>:</td>
                            <td>{{ Auth::user()->kabupaten }}</td>
                            </tr>
                            </tr>
                            <td> Tanggal Masuk</td>
                            <td>:</td>
                            <td>{{ Auth::user()->tgl_masuk }}</td>
                            </tr>
                            </tr>
                            <td> Tanggal Keluar</td>
                            <td>:</td>
                            <td>{{ Auth::user()->tgl_keluar }}</td>
                            </tr>
                            </tr>
                            <td> Catatan Keluar</td>
                            <td>:</td>
                            <td>{{ Auth::user()->note_keluar }}</td>
                            </tr>
                            </tr>
                            <td> Nomor Rekening</td>
                            <td>:</td>
                            <td>{{ Auth::user()->norek }}</td>
                            </tr>
                            </tr>
                            <td> Nomor Bank</td>
                            <td>:</td>
                            <td>{{ Auth::user()->namabank }}</td>
                            </tr>
                            </tr>
                            <td> NIK</td>
                            <td>:</td>
                            <td>{{ Auth::user()->nik }}</td>
                            </tr>

                        </table>
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
                            <a href="{{ route('exportexcel') }}" class="btn btn-info btn-sm"> Export Excel</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-small danger coloured-icon"><i class="icon fa fa-upload fa-3x"></i>
                        <div class="info">
                            <form action=""></form>
                            <h4>Import Data</h4>
                            <button type="button" class="btn btn-info btn-sm" data-toggle="modal" data-target="#import">
                                Import Data
                            </button>
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
                        <div class="embed-responsive embed-responsive-16by9 ">
                            <canvas class="embed-responsive-item align-items-center" width="400" height="200"
                                id="pieChartDemo"></canvas>

                        </div>
                    </div>
                </div>



                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Pegawai Berdasarkan Department</h3>
                        <canvas class="embed-responsive-item" width="400" height="400" id="pegawaiDepartment"></canvas>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Pegawai Berdasarkan Per Site</h3>
                        <canvas class="embed-responsive-item" width="400" height="400" id="pegawaiPerSite"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Pegawai Berdasarkan Golongan</h3>
                        <canvas class="embed-responsive-item" width="400" height="400" id="pegawaiGolongan"></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="tile">
                        <h3 class="tile-title">Pegawai Berdasarkan Status</h3>
                        <canvas class="embed-responsive-item" width="400" height="400" id="myChart"></canvas>
                    </div>
                </div>

            </div>



            <div class="modal fade" id="import" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">IMPORT DATA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <form action="{{ route('importData') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="modal-body">
                                <div class="form-group">
                                    <label>PILIH FILE</label>
                                    <input type="file" name="file" class="form-control" required>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">TUTUP</button>
                                <button type="submit" class="btn btn-info">IMPORT</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        @endrole


    @endsection


    @section('script')
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.0.0/dist/chartjs-plugin-datalabels.min.js">
        </script>

        <script type="text/javascript">
            // Perstatus
            var statusData = {!! json_encode($karyawan_perStatus) !!};
            var dataAktif = statusData['Aktif']['count'];
            var dataTidakAktif = statusData['Tidak Aktif']['count'];
            var statusCtx = document.getElementById('myChart').getContext('2d');
            var pegawaiStatusChart = new Chart(statusCtx, {
                type: 'bar',
                data: {
                    labels: ['Pegawai status'], // Label status
                    datasets: [{
                            label: 'Aktif',
                            data: [dataAktif],
                            backgroundColor: 'rgba(255, 99, 132, 0.5)', // Warna latar belakang
                        },
                        {
                            label: 'Tidak aktif',
                            data: [dataTidakAktif],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna latar belakang
                        },
                    ]
                },
                options: {
                    scales: {
                        x: {
                            categoryPercentage: 0.5, // Mengatur kategori lebar
                            barPercentage: 0.5,
                        },
                        y: {
                            beginAtZero: true,
                            max: 50, // Sesuaikan dengan skala yang diinginkan
                            ticks: {
                                stepSize: 10,
                            },
                            grid: {
                                display: true,
                            },

                        },
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'center',
                            align: 'start',
                            formatter: function(value) {
                                return value;
                            },
                            color: 'black',
                        }
                    },
                },
                plugins: [ChartDataLabels] // Tambahkan plugin datalabels


            });

            // PerSite
            var siteData = {!! json_encode($karyawan_perSite) !!};
            var BAS = siteData['BAS']['count'];
            var PWK = siteData['PWK']['count'];
            var BP = siteData['BP']['count'];
            var SLR = siteData['SLR']['count'];
            var GAM = siteData['GAM']['count'];
            var siteCtx = document.getElementById('pegawaiPerSite').getContext('2d');
            var pegawaiSiteChart = new Chart(siteCtx, {
                type: 'bar',
                data: {
                    labels: ['Pembagian pegawai berdasarkan site'], // Label status
                    datasets: [{
                            label: 'BAS',
                            data: [BAS],
                            backgroundColor: 'rgba(255, 99, 132, 0.5)', // Warna latar belakang
                        },
                        {
                            label: 'PWK',
                            data: [PWK],
                            backgroundColor: 'rgba(54, 162, 235, 0.5)', // Warna latar belakang
                        },
                        {
                            label: 'BP',
                            data: [BP],
                            backgroundColor: 'rgba(75, 192, 192, 0.5)', // Warna latar belakang
                        },
                        {
                            label: 'SLR',
                            data: [SLR],
                            backgroundColor: 'rgba(153, 102, 255, 0.5)', // Warna latar belakang
                        },
                        {
                            label: 'GAM',
                            data: [GAM],
                            backgroundColor: 'rgba(255, 159, 64, 0.5)', // Warna latar belakang
                        },
                    ]
                },
                options: {

                    scales: {
                        x: {
                            categoryPercentage: 30, // Mengatur kategori lebar
                            barPercentage: 30,
                        },

                        y: {
                            beginAtZero: true,
                            max: 20, // Sesuaikan dengan skala yang diinginkan
                            ticks: {
                                stepSize: 5,
                            },
                            grid: {
                                display: true,
                            },

                        },
                    },

                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'end',
                            formatter: function(value) {
                                return value;
                            }
                        }
                    },
                },

                plugins: [ChartDataLabels], // Tambahkan plugin datalabels

            });


            // Per Departemen
            var departmentData = {!! json_encode($persentase_departement) !!};
            var departmentCtx = document.getElementById('pegawaiDepartment').getContext('2d');

            // Menentukan semua departemen yang mungkin
            var allDepartments = [];
            Object.values(departmentData).forEach(departments => {
                allDepartments = [...new Set([...allDepartments, ...Object.keys(departments)])];
            });

            // Warna-warna untuk setiap departemen
            var colors = [
                'rgba(255, 99, 132, 0.5)', // Warna Golongan I
                'rgba(54, 162, 235, 0.5)', // Warna Golongan II
                'rgba(75, 192, 192, 0.5)', // Warna Golongan III
                'rgba(153, 102, 255, 0.5)', // Warna Golongan IV
                'rgba(255, 159, 64, 0.5)', // Warna Golongan V
                'rgba(255, 205, 86, 0.5)', // Warna Golongan VI
                'rgba(201, 203, 207, 0.5)', // Warna Golongan VII
                'rgba(39, 174, 96, 0.5)' // Warna Golongan Eksekutif
            ];

            // Menghasilkan dataset untuk setiap departemen
            var datasets = allDepartments.map((department, index) => {
                return {
                    label: department,
                    data: Object.values(departmentData).map(item => item[department]),
                    backgroundColor: colors[index % colors.length], // Menggunakan warna yang telah ditentukan
                };
            });

            var pegawaiDepartmentChart = new Chart(departmentCtx, {
                type: 'bar',
                data: {
                    labels: Object.keys(departmentData), // Label penempatan
                    datasets: datasets
                },
                options: {
                    scales: {
                        x: {
                            stacked: true,
                            categoryPercentage: 0.6, // Mengatur kategori lebar
                            barPercentage: 0.9,
                            grid: {
                                display: false,
                            },
                        },
                        y: {
                            stacked: true,
                            beginAtZero: true,
                            max: 20, // Sesuaikan dengan skala yang diinginkan
                            ticks: {
                                stepSize: 5,
                            },
                            grid: {
                                display: true,
                            },
                        },
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'start',
                            formatter: function(value) {
                                return value;
                            },
                            color: 'black',
                        }
                    },
                },
                plugins: [ChartDataLabels] // Tambahkan plugin datalabels
            });


            // Pergolongan - Donut




            var data = {
                labels: {!! json_encode($status_lbl) !!},
                datasets: [{
                    label: "Sudah Menikah",
                    backgroundColor: "rgba(220,220,220,0.5)",
                    borderColor: "#000",
                    pointBackgroundColor: "rgba(220,220,220,1)",
                    pointBorderColor: "#000",
                    pointHoverBackgroundColor: "#fff",
                    pointHoverBorderColor: "rgba(220,220,220,1)",
                    data: {!! json_encode($status_val) !!}
                }]
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
            ];

            // Bar Chart
            var ctxb = document.getElementById('barChartDemo').getContext('2d');
            var barChart = new Chart(ctxb, {
                type: 'bar',
                data: data,
                options: {
                    scales: {
                        x: {
                            beginAtZero: true
                        },
                        y: {
                            beginAtZero: true
                        }
                    },
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'center',
                            align: 'start',
                            formatter: function(value) {
                                return value;
                            },
                            color: 'black',
                        }
                    },
                },
                plugins: [ChartDataLabels] // Tambahkan plugin datalabels

            });

            // Pie Chart
            var ctxp = document.getElementById('pieChartDemo').getContext('2d');
            var pieData = {
                labels: pdata.map(item => item.label),
                datasets: [{
                    data: pdata.map(item => item.value),
                    backgroundColor: pdata.map(item => item.color),
                    hoverBackgroundColor: pdata.map(item => item.highlight)
                }]
            };
            var pieChart = new Chart(ctxp, {
                type: 'pie',
                data: pieData,
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'center',
                            align: 'start',
                            formatter: function(value) {
                                return value;
                            },
                            color: 'black',
                        }
                    },
                },
                plugins: [ChartDataLabels] // Tambahkan plugin datalabels



            });

            var golonganData = {!! json_encode($karyawan_perGolongan) !!};

            var data = [{
                    label: 'Golongan I',
                    count: golonganData?.['I']?.['count'] ?? 0
                },
                {
                    label: 'Golongan II',
                    count: golonganData?.['II']?.['count'] ?? 0
                },
                {
                    label: 'Golongan III',
                    count: golonganData?.['III']?.['count'] ?? 0
                },
                {
                    label: 'Golongan IV',
                    count: golonganData?.['IV']?.['count'] ?? 0
                },
                {
                    label: 'Golongan V',
                    count: golonganData?.['V']?.['count'] ?? 0
                },
                {
                    label: 'Golongan VI',
                    count: golonganData?.['VI']?.['count'] ?? 0
                },
                {
                    label: 'Golongan VII',
                    count: golonganData?.['VII']?.['count'] ?? 0
                },
                {
                    label: 'Golongan Eksekutif',
                    count: golonganData?.['Eksekutif']?.['count'] ?? 0
                }
            ];

            // Filter data untuk menghilangkan bagian dengan nilai 0
            var filteredData = data.filter(item => item.count > 0);

            var labels = filteredData.map(item => item.label);
            var counts = filteredData.map(item => item.count);
            var colors = [
                'rgba(255, 99, 132, 0.5)', // Warna Golongan I
                'rgba(54, 162, 235, 0.5)', // Warna Golongan II
                'rgba(75, 192, 192, 0.5)', // Warna Golongan III
                'rgba(153, 102, 255, 0.5)', // Warna Golongan IV
                'rgba(255, 159, 64, 0.5)', // Warna Golongan V
                'rgba(255, 205, 86, 0.5)', // Warna Golongan VI
                'rgba(201, 203, 207, 0.5)', // Warna Golongan VII
                'rgba(39, 174, 96, 0.5)' // Warna Golongan Eksekutif
            ];

            // Ambil warna yang sesuai dengan jumlah label yang ada
            var filteredColors = colors.slice(0, filteredData.length);

            var golonganCtx = document.getElementById('pegawaiGolongan').getContext('2d');

            var pegawaiGolonganChart = new Chart(golonganCtx, {
                type: 'pie',
                data: {
                    labels: labels,
                    datasets: [{
                        data: counts,
                        backgroundColor: filteredColors,
                    }],
                },
                options: {
                    plugins: {
                        legend: {
                            position: 'bottom',
                        },
                        datalabels: {
                            anchor: 'end',
                            align: 'start',
                            formatter: function(value, context) {
                                return context.chart.data.labels[context.dataIndex] + ': ' + value;
                            },
                            color: 'black',
                        }
                    },
                },
                plugins: [ChartDataLabels] // Tambahkan plugin datalabels
            });
        </script>
    @endsection
