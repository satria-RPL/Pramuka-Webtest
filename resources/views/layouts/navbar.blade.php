<!-- navbar  -->
    <nav
        class="navbar navbar-expand-lg {{ Request::segment(1) == '' ? 'navbar-dark' : 'navbar-light' }} py-3 fixed-top {{ Request::segment(1) == '' ? '' : 'bg-white shadow' }}"
        style="{{ Request::segment(1) == '' ? '' : 'background-color: #fff !important; color: #222 !important;' }}">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('assets/icons/logo-ambalan.png') }}" width="55" height="55" alt="Logo Ambalan">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        @if (Request::segment(1) == '')
                            <a class="nav-link active" aria-current="page" href="#hero" id="home-link">Beranda</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/" id="home-link">Beranda</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::segment(1) == '')
                            <a class="nav-link active" aria-current="page" href="#berita" id="berita-link">Program</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/#berita" id="berita-link">Program</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::segment(1) == '')
                            <a class="nav-link active" aria-current="page" href="#foto" id="foto-link">Dokumentasi</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/#foto" id="foto-link">Dokumentas</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::segment(1) == '')
                            <a class="nav-link active" aria-current="page" href="#join" id="join-link">Join</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/#join" id="join-link">Join</a>
                        @endif
                    </li>
                    <li class="nav-item">
                        @if (Request::segment(1) == '')
                            <a class="nav-link active" aria-current="page" href="#footer" id="footer-link">Kontak</a>
                        @else
                            <a class="nav-link active" aria-current="page" href="/#footer" id="footer-link">Kontak</a>
                        @endif
                    </li>
                </ul>
                <div class="d-flex">
                    @auth
                        <form action="/logout" method="POST">
                            @csrf
                            <button class="btn btn-danger" type="submit">Logout</button>
                        </form action="/login" method="POST">
                    @else
                        <button class="btn btn-danger" type="submit">Register</button>
                    @endauth
                </div>

            </div>
        </div>
    </nav>
