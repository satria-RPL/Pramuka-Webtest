<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="shortcut icon" href="{{ asset('assets/icons/logo-url.ico') }}">

    <title>Pramuka Ambalan Milenium</title>

    {{-- Meta untuk tampil di Whatsapp --}}
    @if (Request::segment(1) == '')
        <meta property="og:title" content="Pramuka Ambalan Milenium" />
        <meta name="description" content="Pramuka Ambalan Milenium" />
        <meta property="og:url" content="https://pramukaambalanmilenium.up.railway.app" />
        <meta property="og:description" content="Pramuka Ambalan Milenium" />
        <meta property="og:image" content="{{ asset('assets/icons/logo-ambalan.png') }}" />
        <meta property="og:type" content="article" />
        <title>Pramuka Ambalan Milenium</title>
    @elseif (Request::segment(1) == 'detail')
        <meta property="og:title" content="{{ $artikel->judul }}" />
        <meta name="description" content="{{ $artikel->judul }}" />
        <meta property="og:url" content="https://pramukaambalanmilenium.up.railway.app/detail/{{ $artikel->slug }}" />
        <meta property="og:description" content="{{ $artikel->judul }}" />
        @if ($artikel->image)
            <meta property="og:image" content="{{ asset('storage/artikel/' . $artikel->image) }}" />
        @else
            <meta property="og:image" content="{{ asset('assets/icons/logo-ambalan.png') }}" />
        @endif
        <meta property="og:type" content="article" />
        <title>Pramuka Ambalan Milenium | {{ $artikel->judul }}</title>
    @endif

    <link rel="stylesheet" href="https://unpkg.com/swiper@8/swiper-bundle.min.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    {{-- aos --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    {{-- magnific-popup --}}
    <link rel="stylesheet" href="{{ asset('assets/css/magnific.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>


    {{--  summonernote --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.css">

</head>

<body>

    {{-- navbar --}}
    @include('layouts.navbar')

    {{-- kontent --}}
    @yield('content')

    {{-- Footer --}}
    <section id="footer" class="bg-white py-5">
        <div class="container py-1" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
            <footer>
                <div class="row">
                    {{-- Navigasi --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Navigasi</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                @if (Request::segment(1) == '')
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="#hero"
                                        id="home-link">Beranda
                                        Ambalan</a>
                                @else
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="/"
                                        id="home-link">Beranda
                                        Ambalan</a>
                                @endif
                            </li>
                            <li class="nav-item mb-2">
                                @if (Request::segment(1) == '')
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="#berita"
                                        id="berita-link">Program
                                        Ambalan</a>
                                @else
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="/#berita"
                                        id="berita-link">Program
                                        Ambalan</a>
                                @endif
                            </li>
                            <li class="nav-item mb-2">
                                @if (Request::segment(1) == '')
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="#foto"
                                        id="foto-link">Dokumentasi
                                        Ambalan</a>
                                @else
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="/#foto"
                                        id="foto-link">Dokumentasi
                                        Ambalan</a>
                                @endif
                            </li>
                            <li class="nav-item mb-2">
                                @if (Request::segment(1) == '')
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="#footer"
                                        id="footer-link">Navigasi
                                        Ambalan</a>
                                @else
                                    <a class="nav-link p-0 text-muted" aria-current="page" href="/#footer"
                                        id="footer-link">Navigasi
                                        Ambalan</a>
                                @endif
                            </li>
                        </ul>
                    </div>

                    {{-- Media sosial --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="fw-bold mb-3">Follow Kami</h5>
                        <div class="d-flex mb-3">
                            <a href="https://www.instagram.com/pramukamillenium?igsh=ZGpvaTJ4cWU5azhn"
                                class="text-decoration-none me-3" target="_blank">
                                <img src="{{ asset('assets/icons/ig.png') }}" width="30" height="30"
                                    alt="Instagram">
                            </a>
                            <a href="https://whatsapp.com/channel/0029Vb3KsBnBqbrGeQRivs1i"
                                class="text-decoration-none" target="_blank">
                                <img src="{{ asset('assets/icons/wa.png') }}" width="30" height="30"
                                    alt="WhatsApp">
                            </a>
                        </div>
                    </div>

                    {{-- Kontak --}}
                    <div class="col-12 col-md-3 mb-3" style="margin-left: 0px;">
                        <h5 class="font-inter fw-bold mb-3">Kontak Kami</h5>
                        <ul class="nav flex-column">
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">+62 878-2521-0147</a>
                                <a href="#" class="nav-link p-0 text-muted">(Kak Haikal 25)</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">+62 896-9136-5429</a>
                                <a href="#" class="nav-link p-0 text-muted">(Kak Rival 25)</a>
                            </li>
                            <li class="nav-item mb-2">
                                <a href="#" class="nav-link p-0 text-muted">+62 895-4040-90106</a>
                                <a href="#" class="nav-link p-0 text-muted">(Kak Satria 25)</a>
                            </li>
                        </ul>
                    </div>

                    {{-- Alamat --}}
                    <div class="col-12 col-md-3 mb-3">
                        <h5 class="font-inter fw-bold mb-3">Alamat Sekolah</h5>
                        <p class="text-muted mb-0">
                            Jl. Raya Karadenan No.7, Karadenan, Kec. Cibinong,<br>
                            Kabupaten Bogor, Jawa Barat
                        </p>
                    </div>
                </div>
            </footer>
        </div>
    </section>


    {{-- Private Policy --}}
    <section class="bg-light border-top">
        <div class="container py-4">
            <div class="d-flex justify-content-between">
                <div>
                    Pramuka Ambalan Milenium &copy; 2025
                </div>
                <div class="d-flex">
                    <p class="me-5">Syarat & Ketentuan</p>
                    <p>
                    </p>
                    <a href="/kebijakan" class="text-decoration-none text-dark">Kebijakan Privacy</a>
                </div>
            </div>
        </div>
    </section>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    {{-- aos --}}
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    {{-- magnific-popup --}}
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <script src="{{ asset('assets/js/magnific.js') }}"></script>


    {{-- JQUERY --}}
    {{-- <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
        crossorigin="anonymous"></script> --}}

    {{-- summernote js --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.20/summernote-bs5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('#summernote').summernote({
                height: 200,
            });
        });
    </script>

    <script>
        document.addEventListener("DOMContentLoaded", function() ){
                    function smoothScroll(id) {
                        const el = document.getElementById(id);
                        if (el) {
                            el.scrollIntoView({
                                behavior: "smooth"
                            });
                        }
                    }

                    if (window.location.pathname === "/") {
                        document.getElementById("home-link")?.addEventListener("click", function(e) {
                            e.preventDefault();
                            smoothScroll("hero");
                        });
                        document.getElementById("berita-link")?.addEventListener("click", function(e) {
                            e.preventDefault();
                            smoothScroll("berita");
                        });
                        document.getElementById("foto-link")?.addEventListener("click", function(e) {
                            e.preventDefault();
                            smoothScroll("foto");
                        });
                    }
                }
    </script>



    <script>
        @if (Request::segment(1) == '')
            // Navbar scroll effect hanya aktif di halaman welcome
            const navbar = document.querySelector(".fixed-top");
            window.onscroll = () => {
                if (window.scrollY > 500) {
                    navbar.classList.add("scroll-nav-active");
                    navbar.classList.add("text-nav-active");
                    navbar.classList.remove("navbar-dark");
                } else {
                    navbar.classList.remove("scroll-nav-active");
                    navbar.classList.add("navbar-dark");
                }
            };
        @endif

        // animasi aos
        AOS.init();

        // Magnific
        $(document).ready(function() {
            $('.image-link').magnificPopup({
                type: 'image',
                retina: {
                    ratio: 1,
                    replaceSrc: function(item, ratio) {
                        return item.src.replace(/\.\w+$/, function(m) {
                            return '@2x' + m;
                        });
                    }
                }
            });
        });
    </script>
</body>

</html>

{{-- footer --}}
