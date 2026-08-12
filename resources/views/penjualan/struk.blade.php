<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struk Pembayaran #{{ $sale->id }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: Arial, sans-serif;
            color: #333;
        }
        .receipt-container {
            max-width: 600px;
            margin: 40px auto;
            background: #fff;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0,0,0,0.05);
        }
        @media print {
            body {
                background-color: #fff;
            }
            .receipt-container {
                max-width: 100%;
                margin: 0;
                padding: 10px;
                box-shadow: none;
                border-radius: 0;
            }
            .no-print {
                display: none !important;
            }
        }
    </style>
</head>
<body onload="window.print()">

    <div class="receipt-container">
        
        <!-- Header -->
        <div class="text-center mb-4">
            <h3 class="fw-bold mb-1">STRUK PEMBELIAN</h3>
            <p class="text-muted mb-0">Toko POS Sahlaamnda</p>
        </div>

        <hr>

        <!-- Informasi Transaksi -->
        <div class="row mb-3">
            <div class="col-6">
                <p class="mb-1"><strong>No. Transaksi:</strong> #{{ $sale->id }}</p>
                <p class="mb-1"><strong>Kasir:</strong> {{ $sale->user->name ?? '-' }}</p>
            </div>
            <div class="col-6 text-end">
                <p class="mb-1"><strong>Tanggal:</strong> {{ $sale->updated_at->format('d/m/Y H:i') }}</p>
                <p class="mb-1"><strong>Pembayaran:</strong> {{ $sale->metode_pembayaran }}</p>
            </div>
        </div>

        <!-- Tabel Produk -->
        <table class="table table-bordered align-middle mb-4">
            <thead class="table-light">
                <tr>
                    <th>Produk</th>
                    <th class="text-center">Qty</th>
                    <th class="text-end">Harga</th>
                    <th class="text-end">Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sale->itemPenjualan as $item)
                <tr>
                    <td>{{ $item->produk->nama }}</td>
                    <td class="text-center">{{ $item->kuantitas }}</td>
                    <td class="text-end">Rp {{ number_format($item->harga_satuan, 0, ',', '.') }}</td>
                    <td class="text-end">Rp {{ number_format($item->subtotal, 0, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-end fw-bold">Total Pembayaran:</td>
                    <td class="text-end fw-bold text-success">Rp {{ number_format($sale->total_pembayaran, 0, ',', '.') }}</td>
                </tr>
            </tfoot>
        </table>

        <!-- Footer -->
        <div class="text-center text-muted mt-4">
            <p class="mb-0">Terima kasih atas kunjungan Anda!</p>
            <small>Simpan struk ini sebagai bukti pembayaran yang sah.</small>
        </div>

        <!-- Tombol Aksi (Hilang saat diprint) -->
        <div class="text-center mt-4 no-print">
            <button onclick="window.print()" class="btn btn-primary px-4">Cetak Ulang</button>
            <window.close()></window.close>
            <a href="{{ route('admin.penjualan.show', $sale->id) }}" class="btn btn-secondary px-4 ms-2">Kembali</a>
        </div>

    </div>

</body>
</html>