@extends('layouts.layouts')

@section('content')
    <!-- navbar  -->
    <section id="hero" class="px-0">
        <div class="container text-center text-white" data-aos="zoom-in-up">
            <div class="hero-title ">
                <div class="hero-text" data-aos="fade-up" data-aos-anchor-placement="top-bottom">Selamat Datang <br> Di Pramuka
                    Ambalan Milenium</div>
                <P>Website resmi Pramuka Ambalan Milenium</P>
            </div>
        </div>
    </section>


    <section id="program" style="margin-top: -40px;">
        <div class="container col-xxl-9">
            <div class="row">
                <div class="col-lg-3 col-md-6 mb-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="bg-white rounded-3 shadow justify-content-between p-3 d-flex align-items-center">
                        <div>
                            <h5>-- 19 --</h5>
                        </div>
                        <img src="{{ asset('assets/images/indo.png') }}" height="55" width="55" alt="...">
                        <div>
                            <h5>-- 45 --</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="bg-white rounded-3 shadow justify-content-between p-3 d-flex align-items-center">
                        <div>
                            <h5>-- 19 --</h5>
                        </div>
                        <img src="{{ asset('assets/images/wosm.jpg') }}" height="55" width="55" alt="...">
                        <div>
                            <h5>-- 22 --</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="bg-white rounded-3 shadow justify-content-between p-3 d-flex align-items-center">
                        <div>
                            <h5>-- 20 --</h5>
                        </div>
                        <img src="{{ asset('assets/images/kitri.png') }}" height="55" width="55" alt="...">
                        <div>
                            <h5>-- 17 --</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="bg-white rounded-3 shadow justify-content-between p-3 d-flex align-items-center">
                        <div>
                            <h5>-- 20 --</h5>
                        </div>
                        <img src="{{ asset('assets/icons/logo-ambalan.png') }}" height="55" width="55"
                            alt="...">
                        <div>
                            <h5>-- 01 --</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Program kerja --}}
    <section id="berita" class="section-berita">
        <div class="container py-5">
            <div class="header-berita text-center">
                <h2 class="fw-bold">Program kerja Pramuka Ambalan Milenium</h2>
            </div>
            <div class="row py-4">
                @foreach ($artikels as $item)
                    <div class="col-lg-4 py-3">
                        <div class="card border-0">
                            <img src="{{ asset('storage/artikel/' . $item->image) }}" class="img-fluid mb-3"
                                data-aos="zoom-in" alt="">
                            <div class="konten-berita" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <p class="mb-3 text-secondary">{{ $item->create_at }}</p>
                                <h4 class="fw-bold mb-3">{{ $item->judul }}</h4>
                                <p class="text-secondary">#AmbalanMilenium</p>
                                <a href="/detail/{{ $item->slug }}"
                                    class="text-decoration-none text-danger">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="footer-berita text-center mb-5" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <a href="/berita" class="btn btn-outline-danger ">Program Lainnya</a>
            </div>
        </div>
    </section>

    {{-- Dokumentasi  Foto --}}
    <section id="foto" class="section-foto">
        <div class="container py-5 mt-5">
            <div class="header-dokumentasi text-center text-black py-3" data-aos="fade-up"
                data-aos-anchor-placement="center-bottom">
                <h2 class="fw-bold text-dark">Dokumentasi Pramuka Ambalan Milenium</h2>
            </div>
            <div class="d-flex justify-content-between align-items-center py-3">
                <div class="d-flex align-items-center mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <div class="stripe-putih me-2"></div>
                    <h5 class="fw-bold text-dark">Foto Kegiatan</h5>
                </div>
                <div data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                    <a href="/foto" class="btn btn-outline-danger">Foto Lainnya</a>
                </div>
            </div>
            <div class="row mb-5">
                @foreach ($photos as $photo)
                    <div class="col-lg-3 col-md-6 col-6 mb-4" data-aos="zoom-in">
                        <a class="image-link" href="{{ asset('storage/photo/' . $photo->image) }}">
                            <img src="{{ asset('storage/photo/' . $photo->image) }}" class="img-fluid" alt="">
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Join Ambalan --}}
    <section id="join" class="section-join">
        <div class="container py-5 mt-5">
            <div class="header-join text-center" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                <h2 class="fw-bold">Join Bersama Pramuka Ambalan Milenium</h2>
            </div>
            <div class="row d-flex align-items-center py-3">
                <div class="col-lg-6">
                    <div class="d-flex align-items-center mb-3" data-aos="fade-up"
                        data-aos-anchor-placement="center-bottom">
                        <div class="stripe me-2"></div>
                        <h5>Join Pramuka</h5>
                    </div>
                    <h1 class="fw-bold mb-2" data-aos="fade-up" data-aos-anchor-placement="center-bottom">Gabung bersama
                        kami, mewujudkan generasi berkarakter</h1>
                    <p class="mb-3" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                        Pramuka Ambalan Milenium adalah wadah bagi generasi muda untuk belajar, berlatih, dan
                        mengembangkan diri melalui kegiatan kepramukaan yang menyenangkan dan bermanfaat.
                        Bergabunglah bersama kami untuk menjadi bagian dari komunitas yang peduli dan aktif dalam
                        membangun karakter bangsa.
                    </p>
                    <a href="https://forms.gle/X2BR1d2Gy4K5rjQ37" class="btn btn-outline-danger" target="_blank"
                        data-aos="fade-up" data-aos-anchor-placement="center-bottom">Daftar</a>
                </div>
                <div class="col-lg-6 py-3" data-aos="zoom-in">
                    <img src="{{ asset('assets/images/none.jpg') }}" class="img-fluid" alt="" height="40">
                </div>
            </div>
        </div>
    </section>
@endsection
