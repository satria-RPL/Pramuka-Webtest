@extends('layouts.layouts')

@section('content')
    <section class="py-3" style="margin-top: 100px">
        <div class="container col-xxl-8">
            <h4 class="">Halaman Dokumentasi Pramuka Ambalan Milenium</h4>
            <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#uploadmodal">Upload Photo</a>
            {{-- Pesan Sukses --}}
            @if (session()->has('success'))
                <div class="alert alert-success alert-dismissible fade show mt-3" role="alert">
                    <strong>Informasi</strong> {{ session('success') }}

                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif


            {{-- menampilkan error validasi --}}
            @if (count($errors) > 0)
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <div class="table-responsive py-3">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Kegiatan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($photos as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>
                                    <img src="{{ asset('storage/photo/' . $item->image) }}" height="150" alt="">
                                </td>
                                <td>
                                    {{ $item->judul }}
                                </td>
                                <td>
                                    <a href="#" class="btn btn-warning" data-bs-target="#editModal{{ $item->id }}" data-bs-toggle="modal">Edit</a>
                                    <form action="{{ route('photo.destroy', $item->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" onclick="alert('Apakah Anda yakin ingin Menghapus?')"
                                            class="btn btn-danger">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                            {{-- Modal Edit --}}
                            <div class="modal fade" id="editModal{{ $item->id }}" tabindex="-1" aria-labelledby="editModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="editModalLabel">Modal Edit</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="{{ route('photo.update', $item->id) }}" method="POST"
                                                enctype="multipart/form-data">
                                                @csrf
                                                
                                                <input type="hidden" name="id_photo" value="{{ $item->id }}">

                                                <div class="form-group mb-3">
                                                    <label for="">Pilih Photo</label>
                                                    <div class="col-lg-4">
                                                        <img src="{{ asset('storage/photo/' . $item->image) }}" height="150" 
                                                        alt="">
                                                    </div>
                                                    <input type="hidden" name="old_image" value="{{ $item->image }}">
                                                    <input type="file" class="form-control" name="image">
                                                </div>
                                                <div class="form-group mb-3">
                                                    <label for="">Nama Kegiatan</label>
                                                    <input type="text" class="form-control" name="judul" 
                                                    value="{{ $item->judul }}">
                                                </div>

                                                <button type="submit" class="btn btn-primary">Update</button>

                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <a href="{{ url('/dashboard') }}" class="btn btn-danger px-4">Kembali</a>
            </div>
        </div>
    </section>
    <!-- Modal Simpan-->
    <div class="modal fade" id="uploadmodal" tabindex="-1" aria-labelledby="uploadmodalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="uploadmodalLabel">Modal Upload</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Pilih Photo</label>
                            <input type="file" class="form-control" name="image">
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Nama Kegiatan</label>
                            <input type="text" class="form-control" name="judul">
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
