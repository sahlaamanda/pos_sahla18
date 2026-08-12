@extends('layouts.app')

@section('title', 'Halaman Produk')

@section('content')

<style>
    body{
        background:#FFF8FA;
    }

    .page-title{
        background:linear-gradient(135deg,#800020,#A52A4D);
        color:white;
        padding:18px 25px;
        border-radius:20px;
        margin-bottom:25px;
        box-shadow:0 10px 25px rgba(128,0,32,.15);
    }

    .card-custom{
        background:white;
        border:none;
        border-radius:20px;
        padding:25px;
        box-shadow:0 10px 25px rgba(128,0,32,.08);
    }

    .btn-maroon{
        background:#800020;
        color:white;
        border:none;
        border-radius:12px;
        padding:10px 18px;
    }

    .btn-maroon:hover{
        background:#A52A4D;
        color:white;
    }

    .btn-edit{
        background:#D63384;
        color:white;
        border:none;
        border-radius:10px;
    }

    .btn-delete{
        background:#800020;
        color:white;
        border:none;
        border-radius:10px;
    }

    .form-control{
        border-radius:12px;
        border:2px solid #F4C2D7;
    }

    .table{
        border-radius:15px;
        overflow:hidden;
    }

    .table thead{
        background:#800020;
        color:white;
    }

    .table thead th{
        border:none;
    }

    .table tbody tr:hover{
        background:#FFF0F5;
    }

    .produk-img{
        width:80px;
        height:80px;
        object-fit:cover;
        border-radius:15px;
        border:2px solid #F4C2D7;
    }

    .stok-badge{
        background:#FFE4EC;
        color:#800020;
        padding:7px 15px;
        border-radius:20px;
        font-weight:600;
    }
</style>


<div class="container mt-4">


    <div class="page-title">
        <h2 class="mb-1">📦 Manajemen Produk</h2>
        <small>Kelola semua data produk toko</small>
    </div>


    <div class="card-custom">


        <div class="d-flex justify-content-between align-items-center mb-4">


            <a href="{{ route('admin.produk.create') }}" 
               class="btn btn-maroon">

                ➕ Tambah Produk

            </a>



            <form action="{{ route('admin.produk.index') }}" 
                  method="GET"
                  style="width:350px;">


                <div class="input-group">


                    <input type="text"
                           name="search"
                           class="form-control"
                           placeholder="Cari nama produk..."
                           value="{{ request('search') }}">



                    <button class="btn btn-maroon">

                        🔍 Cari

                    </button>


                </div>


            </form>


        </div>



        <div class="table-responsive">


            <table class="table table-hover align-middle">


                <thead>

                    <tr>

                        <th>#</th>
                        <th>User</th>
                        <th>Foto</th>
                        <th>Nama Produk</th>
                        <th>Jenis</th>
                        <th>Harga Beli</th>
                        <th>Harga Jual</th>
                        <th>Stok</th>
                        <th width="180">Aksi</th>

                    </tr>

                </thead>



                <tbody>


                @forelse($produk as $item)


                    <tr>


                        <td>
                            {{ $loop->iteration + ($produk->firstItem() - 1) }}
                        </td>



                        <td>
                            {{ $item->user->name ?? '-' }}
                        </td>



                        <td>

                            @if($item->foto)

                                <img src="{{ asset('storage/'.$item->foto) }}"
                                     class="produk-img"
                                     alt="Foto Produk">

                            @else

                                <span class="text-muted">
                                    Tidak ada foto
                                </span>

                            @endif

                        </td>




                        <td>

                            <strong>
                                {{ $item->nama }}
                            </strong>

                        </td>




                        {{-- JENIS PRODUK --}}

                        <td>

                            {{ $item->jenis ?? '-' }}

                        </td>




                        {{-- HARGA BELI --}}

                        <td>

                            Rp {{ number_format($item->harga_beli,0,',','.') }}

                        </td>




                        {{-- HARGA JUAL --}}

                        <td>

                            Rp {{ number_format($item->harga_jual,0,',','.') }}

                        </td>




                        {{-- STOK --}}

                        <td>

                            <span class="stok-badge">

                                {{ $item->stok }} Unit

                            </span>

                        </td>




                        {{-- AKSI --}}

                        <td>


                            <div class="d-flex gap-2">


                                <a href="{{ route('admin.produk.edit',$item->id) }}"
                                   class="btn btn-sm btn-edit">

                                    ✏ Edit

                                </a>




                                <form action="{{ route('admin.produk.destroy',$item->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin ingin menghapus produk ini?')">


                                    @csrf
                                    @method('DELETE')



                                    <button class="btn btn-sm btn-delete">

                                        🗑 Hapus

                                    </button>



                                </form>


                            </div>


                        </td>


                    </tr>



                @empty


                    <tr>

                        <td colspan="9" class="text-center py-4">

                            Belum ada data produk.

                        </td>

                    </tr>


                @endforelse



                </tbody>


            </table>


        </div>



        <div class="mt-4 d-flex justify-content-center">

            {{ $produk->links() }}

        </div>



    </div>


</div>


@endsection