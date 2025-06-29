@extends('layouts.layouts')

@section('content')
    <section style="margin-top: 100px">
        <div class="container col-xxl-8 py-5">
            <h3 class="fw-bold mb-2">Halaman Dashboard Admin</h3>
            <p>Selamat datang di halaman dashboard admin</p>
            <div class="row">
                <div class="col-lg-4 mb-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/progja.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Program Kerja Pramuka Ambalan Milenium</h5>
                            <p class="card-text">Atur dan kelola Program Kerja Ambalan Milenium</p>
                            <a href="{{ route('blog') }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="card shadow-sm rounded-3 border-0">
                        <img src="{{ asset('assets/images/kolase.jpg') }}" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Photo Kegiatan Pramuka Ambalan Milenium</h5>
                            <p class="card-text">Atur dan kelola Photo Kegiatan Ambalan Milenium</p>
                            <a href="{{ route('photo') }}" class="btn btn-primary">Detail</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
