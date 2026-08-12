@extends('layouts.app')

@section('title', 'Edit Jenis Produk')

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

    .form-control,
    textarea.form-control {
        border-radius: 12px;
        border: 2px solid #F4C2D7;
    }

    .form-control:focus {
        border-color: #800020;
        box-shadow: none;
    }
</style>

<div class="container mt-4">

    <div class="page-title">
        <h2 class="mb-1">✏️ Edit Jenis Produk</h2>
        <small>Perbarui data jenis produk</small>
    </div>

    <div class="card-custom">

        <form action="{{ route('admin.jenis.update', $jenis->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Nama Jenis</label>

                <input
                    type="text"
                    name="nama_jenis"
                    class="form-control"
                    value="{{ old('nama_jenis', $jenis->nama_jenis) }}"
                    placeholder="Contoh: Minuman"
                >

                @error('nama_jenis')
                    <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>

           

            <div class="d-flex gap-2">
                <button type="submit" class="btn btn-maroon">
                    💾 Update
                </button>

                <a href="{{ route('admin.jenis.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>
</div>

@endsection