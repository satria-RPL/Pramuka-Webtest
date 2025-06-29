@extends('layouts.layouts')

@section('content')
        <section id="berita" style="margin-top: 100px;">
        <div class="container py-5">
            <div class="header-berita text-center">
                <h2 class="fw-bold">Program kerja Pramuka Ambalan Milenium</h2>
            </div>

            <div class="row py-5">
                @foreach ($artikels as $item)
                    <div class="col-lg-4 py-3">
                        <div class="card border-0">
                            <img src="{{ asset('storage/artikel/' . $item->image) }}" class="img-fluid mb-3" data-aos="fade-up"
                                data-aos-anchor-placement="center-bottom" alt="">
                            <div class="konten-berita" data-aos="fade-up" data-aos-anchor-placement="center-bottom">
                                <p class="mb-2 text-secondary">{{ $item->create_at }}</p>
                                <h4 class="fw-bold mb-2">{{ $item->judul }}</h4>
                                <p class="text-secondary mb-2">#AmbalanMilenium</p>
                                <a href="{{ url('/detail/' . $item->slug) }}" class="text-decoration-none text-danger mb-3">Selengkapnya</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
@endsection