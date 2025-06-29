@extends('layouts.layouts')


@section('content')
    <section id="detail" style="margin-top: 100px" class="py-5">
        <div class="container col-xxl-8">
            <div class="d-flex mb-3">
                <a href="/">Home</a> / <a href="/berita">Berita</a> / Rapat Kerja Pramuka Ambalan Milenium
            </div>
            <img src="{{ asset('storage/artikel/' . $artikel->image) }}" class="img-fluid mb-3" alt="">
            <div class="konten-berita">
                <p class="mb-3 text-secondary">{{ $artikel->create_at }}</p>
                <h4 class="fw-bold mb-3">{{ $artikel->judul }}</h4>
                <p class="text-secondary">{!! $artikel->desc !!}</p>
            </div>
        </div>
    </section>
@endsection
