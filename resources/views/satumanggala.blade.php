<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MANGGALA LUAR BIASA</title>
    <link rel="stylesheet" href="{{ asset('template/docs/css/style.css') }}">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script>
    $(document).ready(function(){
        $("a").on('click', function(event) {
            if (this.hash !== "") {
                event.preventDefault();
                var hash = this.hash;
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function(){
                    window.location.hash = hash;
                }); 
            } 
        });
    });
    </script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #ffffff;
        }

        .navbar {
            background-color: #FF7D29;
        }

        .navbar-brand {
            font-weight: bold;
            color: #fff;
        }

        .navbar-nav .nav-link {
            color: #fff;
        }

        .page_a {
            text-align: center;
        }

        .page_a .description {
            font-size: 1.5rem;
            font-weight: bold;
            color: #ff9800;
        }

        .page_a h2 {
            font-size: 2.5rem;
            color: #333;
        }

        .page_a p {
            font-size: 1.2rem;
            color: #555;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.2s;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card-title {
            font-size: 1.2rem;
            font-weight: bold;
            color: #333;
        }

        .card-text {
            color: #777;
        }

        .btn-primary {
            background-color: #ff9800;
            border: none;
        }

        .btn-primary:hover {
            background-color: #e68900;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-danger fixed-top">
        <div class="container">
          <a class="navbar-brand" href="/homeku">M1S</a>
          {{-- <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"> --}}
            {{-- <span class="navbar-toggler-icon"></span> --}}
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">Pricing</a>
              </li> --}}
              {{-- <li class="nav-item">
                <a class="nav-link" href="#">SATU MANGGALA</a>
              </li> --}}
              {{-- <li class="nav-item">
                <a class="nav-link disabled" aria-disabled="true">Disabled</a>
              </li> --}}
            </ul>
          </div>
        </div>
    </nav>

    <div class="container page_a" style="margin-top: 100px;">
        <section id="home">
            <img src="img/hormat.png" width="100px" alt="MIS Logo">
            <div class="column mt-0">
                <p class="description mt-5">SATU MANGGALA</p>
                {{-- <h2>MIS</h2> --}}
                <p>"1. Synergy Ability"</p>
                <p>"2. Think Betterways"</p>
                <p>"3. Upgrade Integrity"</p>
            </div>
        </section>
    </div>
    
    <div class="container page_b" style="margin-top: 50px;">
        <section id="coi">
            
            <div class="column mt-0">
                <p class="description mt-4">Synergy Ability</p>
                {{-- <h2>MIS</h2> --}}
                <p>1. Selalu meningkatkan kompetensi diri dan berpartisipasi aktiv dengan kontribusi nyata sesuai tugas dan tanggung jawab</p>
                <p>2. Mengutamakan kerjasama team yang solid dan berorientasi pada proses, hasil dan waktu</p>
                
                <p class="description mt-4">Think Betterways</p>
                {{-- <h2>MIS</h2> --}}
                <p>1. Pantang menyerah</p>
                <p>2. Selalu berfikir positif</p>
                <p>3. Proaktif mencari solusi dan adaptif mengikuti perkembangan industri</p>
                
                <p class="description mt-4">Upgrade Integrity</p>
                {{-- <h2>MIS</h2> --}}
                <p>1. Mengedepankan tindakan yang selaras antara etika kerja dengan komitmen win-win solution</p>
                <p>2. Tidak menyalahkan orang lain, berani mengambil tanggung jawab</p>

                
                
            </div>
        </section>
    </div>

    <div class="container mt-5 center">
        <div class="row">
            <h2>Filosofi</h2>
            <p>1. Leader yang memiliki visi luas mampu merencanakan masa depan dan mengarahkan team menuju tujuan</p>
            <p>2. Leader yang memiliki jiwa luas, sabar, dan persisten untuk mengkader teamnya dan mengambil tanggung jawab atas resikonya</p>
            <p>3. Leader yang mampu merayakan keberhasilan teamnya</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
