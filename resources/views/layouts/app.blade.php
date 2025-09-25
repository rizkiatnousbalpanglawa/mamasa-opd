<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <title>KOMINFO - KABUPATEN MAMASA</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />

    <!-- Favicons -->
    {{-- <link href="{{ asset(Storage::url($opd->image)) }}" rel="icon" />
    <link href="{{ asset(Storage::url($opd->image)) }}" rel="apple-touch-icon" /> --}}

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect" />
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Inter:wght@100;200;300;400;500;600;700;800;900&family=Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet" />

    <!-- Vendor CSS Files -->
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/aos/aos.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet" />

    <!-- Main CSS File -->
    <link href="{{ asset('assets/css/main.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" />
</head>

<body class="index-page">

    @php
        $opd = \App\Models\IdentitasOpd::first();
    @endphp

    <header id="header" class="header d-flex align-items-center fixed-top">
        <div
            class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">
            <a href="{{ url('/') }}" class="logo d-flex align-items-center me-auto me-xl-0">
                <img src="{{ $opd ? asset(Storage::url($opd->image)) : '' }}" alt="" />
                <div class="">
                    <h1 class="sitename">{{ $opd ? Str::limit($opd->singkatan, 15) : '' }}</h1>
                    {{-- <h6 class="d-none d-md-block">{{ Str::limit($opd->nama, 50) }}</h6> --}}
                </div>
            </a>

            <x-navigation-menu />

            <a class="btn-getstarted" href="https://mamasa.usbal.xyz">PORTAL</a>
            {{-- <a class="btn-getstarted" href="https://mamasa.usbal.xyz">PORTAL <i class="bi bi-arrow-up-right"></i></a> --}}
        </div>
    </header>

    {{ $slot }}

    @php
        $today = \Carbon\Carbon::today();
        $statToday = \App\Models\StatistikHarian::where('tanggal', $today)->first();

        $pengunjungHariIni = $statToday->pengunjung ?? 0;
        $hitsHariIni = $statToday->hits ?? 0;

        $totalPengunjung = \App\Models\StatistikHarian::sum('pengunjung');
        $totalHits = \App\Models\StatistikHarian::sum('hits');

        $pengunjungOnline = \App\Models\StatistikOnline::where(
            'last_activity',
            '>=',
            \Carbon\Carbon::now()->subMinutes(5),
        )->count();

    @endphp

    <footer id="footer" class="footer position-relative light-background">
        <div class="container footer-top">
            <div class="row gy-4 text-center">

                @if ($opd)
                    <div class="col-lg-5 footer-about">
                        <a href="{{ url('/') }}" class="logo">
                            <img src="{{ asset(Storage::url($opd->image)) }}" class="img-fluid" alt="Logo Website" />

                        </a>
                        <h5 class="mt-3">{{ $opd->nama }}</h5>
                        <hr>
                        <div class="footer-contact">
                            {!! $opd->alamat !!}
                        </div>
                        <div class="social-links d-flex justify-content-center mt-4">
                            <a href="{{ $opd->twitter }}"><i class="bi bi-twitter-x"></i></a>
                            <a href="{{ $opd->facebook }}"><i class="bi bi-facebook"></i></a>
                            <a href="{{ $opd->instagram }}"><i class="bi bi-instagram"></i></a>
                            <a href="{{ $opd->youtube }}"><i class="bi bi-youtube"></i></a>
                            <a href="{{ $opd->tiktok }}"><i class="bi bi-tiktok"></i></a>
                        </div>
                    </div>

                    <div class="col-lg-3 align-self-center">
                        <div class="statistik">
                            <h5>Statistik</h5>
                            <h1 class="fw-bold"> {{ number_format($totalHits) }}</h1>
                            <div class="">Pengunjung Hari ini: <span
                                    class="fw-bold">{{ $pengunjungHariIni }}</span>
                            </div>
                            <div class="">Total Pengunjung: <span class="fw-bold">{{ $totalPengunjung }}</span>
                            </div>
                            <div class="">Hits Hari ini: <span class="fw-bold">{{ $hitsHariIni }}</span></div>
                            <div class="">Pengunjung Online: <span class="fw-bold">{{ $pengunjungOnline }}</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-4 align-self-center">
                        <iframe class="w-full h-70 border-0 rounded"
                            src="https://www.google.com/maps?q={{ $opd->latitude }},{{ $opd->longitude }}&hl=id&z=18&output=embed"
                            allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                    </div>
                @else
                    <div class="">
                        Data Belum Diisi.
                    </div>
                @endif

            </div>
        </div>

        <div class="container copyright text-center mt-4">

        </div>
    </footer>

    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="{{ asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
</body>

</html>
