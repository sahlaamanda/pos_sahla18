@extends('layouts.app')

@section('title', 'Halaman Jenis Produk')

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

    .btn-edit {
        background: #D63384;
        color: white;
        border: none;
        border-radius: 10px;
    }

    .btn-delete {
        background: #800020;
        color: white;
        border: none;
        border-radius: 10px;
    }

    .form-control {
        border-radius: 12px;
        border: 2px solid #F4C2D7;
    }

    .table {
        border-radius: 15px;
        overflow: hidden;
    }

    .table thead {
        background: #800020;
        color: white;
    }

    .table thead th {
        border: none;
    }

    .table tbody tr:hover {
        background: #FFF0F5;
    }

    .jumlah-badge {
        background: #FFE4EC;
        color: #800020;
        padding: 7px 15px;
        border-radius: 20px;
        font-weight: 600;
    }
</style>

<div class="container mt-4">

    {{-- PESAN ERROR --}}
    @if(session('errors'))
        <div class="alert alert-danger alert-dismissible fade show">
            {{ session('errors') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- PESAN SUKSES --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show">
            {{ session('success') }}
            <button class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    {{-- JUDUL --}}
    <div class="page-title">
        <h2 class="mb-1">🏷️ Manajemen Jenis Produk</h2>
        <small>Kelola semua jenis/kategori produk</small>
    </div>

    <div class="card-custom">

        {{-- TOMBOL TAMBAH & SEARCH --}}
        <div class="d-flex justify-content-between align-items-center mb-4">

            <a href="{{ route('admin.jenis.create') }}" class="btn btn-maroon">
                ➕ Tambah Jenis
            </a>

            <form action="{{ route('admin.jenis.index') }}"
                  method="GET"
                  style="width:350px;">

                <div class="input-group">

                    <input
                        type="text"
                        name="search"
                        class="form-control"
                        placeholder="Cari jenis..."
                        value="{{ request('search') }}"
                    >

                    <button type="submit" class="btn btn-maroon">
                        🔍 Cari
                    </button>

                </div>
            </form>

        </div>

        {{-- TABEL --}}
        <div class="table-responsive">

            <table class="table table-hover align-middle">

                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama Jenis</th>
                        <th>Jumlah Produk</th>
                        <th width="180">Aksi</th>
                    </tr>
                </thead>

                <tbody>

                @forelse($jenis as $item)

                    <tr>

                        {{-- NOMOR --}}
                        <td>
                            {{ $loop->iteration + ($jenis->firstItem() - 1) }}
                        </td>

                        {{-- NAMA JENIS --}}
                        <td>
                            <strong>
                                {{ $item->nama_jenis }}
                            </strong>
                        </td>

                        {{-- JUMLAH PRODUK --}}
                        <td>
                            <span class="jumlah-badge">
                                {{ $item->produk_count }} Produk
                            </span>
                        </td>

                        {{-- AKSI --}}
                        <td>

                            <div class="d-flex gap-2">

                                {{-- EDIT --}}
                                <a href="{{ route('admin.jenis.edit', $item->id) }}"
                                   class="btn btn-sm btn-edit">
                                    ✏ Edit
                                </a>

                                {{-- HAPUS --}}
                                <form action="{{ route('admin.jenis.destroy', $item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus jenis ini?')">

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit"
                                            class="btn btn-sm btn-delete">
                                        🗑 Hapus
                                    </button>

                                </form>

                            </div>

                        </td>

                    </tr>

                @empty

                    <tr>
                        <td colspan="4" class="text-center py-4">
                            Belum ada data jenis.
                        </td>
                    </tr>

                @endforelse

                </tbody>

            </table>

        </div>

        {{-- PAGINATION --}}
        <div class="mt-4 d-flex justify-content-center">
            {{ $jenis->links() }}
        </div>

    </div>

</div>

@endsection