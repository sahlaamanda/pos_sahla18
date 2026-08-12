@extends('layouts.app')

@section('title', 'Detail Penjualan')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Detail Penjualan</h2>
        
        {{-- TOMBOL CETAK STRUK --}}
        @if($sale->status === 'COMPLETED')
            <a href="{{ route('admin.penjualan.struk', $sale->id) }}" target="_blank" class="btn btn-success">
                🖨️ Cetak Struk
            </a>
        @endif
    </div>

    {{-- DATA TRANSAKSI --}}
    <div class="card mb-4">
        <div class="card-body">

            <p><strong>Tanggal:</strong> {{ $sale->created_at->format('d-m-Y H:i:s') }}</p>
            <p><strong>Kasir:</strong> {{ $sale->user->name }}</p>
            <p><strong>Metode Pembayaran:</strong> {{ $sale->metode_pembayaran }}</p>
            <p><strong>Status:</strong> {{ $sale->status }}</p>
            <p><strong>Total:</strong> Rp.{{ number_format($sale->total_pembayaran,0,',','.') }}</p>

        </div>
    </div>

    {{-- ITEM PRODUK --}}
    <div class="card">
        <div class="card-body">

            <h5 class="mb-3">Item Produk</h5>

            <div class="table-responsive">
                <table class="table table-bordered">

                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($sale->itemPenjualan as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->produk->nama }}</td>
                            <td>Rp.{{ number_format($item->harga_satuan,0,',','.') }}</td>
                            <td>{{ $item->kuantitas }}</td>
                            <td>Rp.{{ number_format($item->subtotal,0,',','.') }}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>

        </div>
    </div>

    <div class="mt-3">
        <a href="{{ route('admin.penjualan.index') }}" class="btn btn-secondary">
            Kembali
        </a>
    </div>

</div>

@endsection 