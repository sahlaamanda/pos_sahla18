@extends('layouts.app')

@section('title', 'Tambah Jenis Produk')

@section('content')

<style>
    body {
        background: #FFF8FA;
    }

    .page-title {
        background: linear-gradient(135deg, #800020, #A52A4D);
        color: white;
        padding: 18px 25px;
        border-radius: 20px;
        margin-bottom: 25px;
        box-shadow: 0 10px 25px rgba(128, 0, 32, .15);
    }

    .card-custom {
        background: white;
        border: none;
        border-radius: 20px;
        padding: 25px;
        box-shadow: 0 10px 25px rgba(128, 0, 32, .08);
    }

    .btn-maroon {
        background: #800020;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 10px 18px;
    }

    .btn-maroon:hover {
        background: #A52A4D;
        color: white;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #F4C2D7;
    }

    .form-control:focus {
        border-color: #800020;
        box-shadow: 0 0 0 0.2rem rgba(128, 0, 32, .1);
    }
</style>

<div class="container mt-4">

    {{-- JUDUL --}}
    <div class="page-title">
        <h2 class="mb-1">➕ Tambah Jenis Produk</h2>
        <small>Isi nama jenis produk baru</small>
    </div>

    {{-- FORM --}}
    <div class="card-custom">

        <form action="{{ route('admin.jenis.store') }}" method="POST">

            @csrf

            {{-- NAMA JENIS --}}
            <div class="mb-4">

                <label for="nama_jenis" class="form-label">
                    Nama Jenis
                </label>

                <input
                    type="text"
                    id="nama_jenis"
                    name="nama_jenis"
                    class="form-control @error('nama_jenis') is-invalid @enderror"
                    value="{{ old('nama_jenis') }}"
                    placeholder="Contoh: Minuman"
                    required
                    autofocus
                >

                @error('nama_jenis')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror

            </div>

            {{-- TOMBOL --}}
            <div class="d-flex gap-2">

                <button type="submit" class="btn btn-maroon">
                    💾 Simpan
                </button>

                <a href="{{ route('admin.jenis.index') }}"
                   class="btn btn-secondary">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

@endsection