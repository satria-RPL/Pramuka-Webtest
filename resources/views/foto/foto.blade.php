@extends('layouts.layouts')

@section('content')
<section id="foto" style="margin-top: 100px;">
    <div class="container py-5">
        <div class="header-berita text-center">
            <h2 class="fw-bold">Dokumentasi Pramuka Ambalan Milenium</h2>
        </div>
        <p class="text-center mb-4">Berikut dokumentasi kegiatan Pramuka Ambalan Milenium selama kegiatan rutin dan event.</p>
        <div class="row py-5">
            @foreach ($photos as $photo)
                <div class="col-lg-3 col-md-4 col-6 mb-4" data-aos="zoom-in">
                    <a class="image-link" href="{{ asset('storage/photo/' . $photo->image) }}">
                        <img src="{{ asset('storage/photo/' . $photo->image) }}"
                            class="img-fluid rounded shadow-sm"
                            alt="{{ $photo->judul }}"
                            style="aspect-ratio: 1/1; object-fit: cover;">
                    </a>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
