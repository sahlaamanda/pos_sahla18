@extends('layouts.app')

@section('title', 'Dashboard Analytics')

@section('content')

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>

@import url('https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap');


:root {

    --maroon:#800020;
    --maroon-dark:#4b0012;
    --maroon-light:#a52a4f;

    --bg-body:#fff8fa;
    --card-bg:#ffffff;

    --text-main:#3d0a17;
    --text-muted:#8b5f6b;

    --border-color:#f2cbd5;
    --table-header-bg:#fff1f5;
    --hover-bg:#fff5f7;


    --hero-bg:
    linear-gradient(135deg,#4b0012,#800020,#a52a4f);


    --shadow:
    0 10px 30px rgba(128,0,32,.15);

}


body {

    background:var(--bg-body)!important;
    font-family:'Plus Jakarta Sans',
    sans-serif!important;
    color:var(--text-main);

}

/* HERO */

.hero-banner {
    background:var(--hero-bg);
    border-radius:30px;
    padding:2.5rem;
    color:white;
    box-shadow:var(--shadow);
    margin-bottom:2rem;
    overflow:hidden;
    position:relative;
}


.hero-banner::after {

    content:"🌸";
    font-size:120px;
    position:absolute;
    right:40px;
    top:-20px;
    opacity:.2;

}


.hero-title {

    font-size:2.3rem;
    font-weight:800;
}


.hero-date {
    color:#ffd6df;
}



/* SECTION */

.section-title-custom {
    background:white;
    border:2px solid #f5c4d1;
    color:#800020;
    padding:8px 20px;
    border-radius:50px;
    font-weight:800;
    box-shadow:var(--shadow);
}



/* CARD */


.stat-card {
    background:white;
    border-radius:25px;
    border:1px solid var(--border-color);
    padding:1.5rem;
    box-shadow:var(--shadow);
    transition:.3s;
}



.stat-card:hover {
    transform:translateY(-8px);
}



/* ICON CUTE */

.icon-wrapper {
    width:65px;
    height:65px;
    border-radius:22px;
    display:flex;
    justify-content:center;
    align-items:center;
    font-size:1.6rem;
    color:white;
}



.bg-blue-grad {
background:
linear-gradient(135deg,#800020,#c94f75);
}


.bg-green-grad {
background:
linear-gradient(135deg,#9b2335,#ff8fab);
}


.bg-orange-grad {
background:
linear-gradient(135deg,#b56576,#800020);
}

.bg-purple-grad {
background:
linear-gradient(135deg,#800020,#4b0012);
}



/* TABLE */
.table-container {
background:white;
border-radius:25px;
overflow:hidden;
box-shadow:var(--shadow);
border:1px solid var(--border-color);
}



.table-header-custom {
padding:1.2rem;
font-weight:800;
}

.header-warning {
background:#fff0d9;
color:#b45309;
}


.header-danger {
background:#ffe5ea;
color:#800020;
}

.header-dark {
background:#800020;
color:white;
}

.custom-table thead th {
background:#fff1f5!important;
color:#8b5f6b!important;
}

.custom-table tbody td {
color:#3d0a17;
padding:1.1rem!important;
}

/* BADGE */

.badge-soft-warning {
background:#fff0d9;
color:#b45309;
border-radius:50px;
padding:7px 15px;
font-weight:700;
}

.badge-soft-danger {
background:#ffe0e8;
color:#800020;
border-radius:50px;
padding:7px 15px;
font-weight:700;
}

.badge-soft-primary {
background:#ffe5ef;
color:#800020;
border-radius:50px;
padding:7px 16px;
font-weight:800;
}

.fa-boxes-stacked,
.fa-fire,
.fa-chart-pie,
.fa-credit-card {

color:#800020!important;

}


</style>
<div class="container py-4">

    {{-- HERO HEADER WITH THEME TOGGLE --}}
    <div class="hero-banner">
        <div class="d-flex justify-content-between align-items-center">
            <div>
                <h1 class="hero-title mb-1">Ringkasan Hari Ini</h1>
                <div class="hero-date">
                    <i class="far fa-calendar-alt me-2"></i>{{ $tanggalHariIni->translatedFormat('l, d F Y') }}
                </div>
            </div>
            </div>
        </div>
    </div>

    @can('viewAny', App\Models\User::class)

        {{-- SALES METRICS --}}
        <div class="section-header-custom">
            <span class="section-title-custom"><i class="fas fa-chart-pie me-2 text-primary"></i>Today's Sales</span>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-blue-grad">
                        <i class="fas fa-wallet"></i>
                    </div>
                    <div>
                        <div class="stat-title">Total Penjualan</div>
                        <h3 class="stat-number">
                            Rp {{ number_format($ringkasan['total_penjualan'] ?? 0, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-green-grad">
                        <i class="fas fa-receipt"></i>
                    </div>
                    <div>
                        <div class="stat-title">Jumlah Transaksi</div>
                        <h3 class="stat-number">
                            {{ number_format($ringkasan['jumlah_transaksi'] ?? 0, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

        {{-- PAYMENT METRICS --}}
        <div class="section-header-custom">
            <span class="section-title-custom"><i class="fas fa-credit-card me-2 text-warning"></i>Cash & Payment Status</span>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-orange-grad">
                        <i class="fas fa-money-bill-wave"></i>
                    </div>
                    <div>
                        <div class="stat-title">Pembayaran Tunai</div>
                        <h3 class="stat-number">
                            Rp {{ number_format($ringkasan['total_cash'] ?? 0, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="stat-card">
                    <div class="icon-wrapper bg-purple-grad">
                        <i class="fas fa-qrcode"></i>
                    </div>
                    <div>
                        <div class="stat-title">Pembayaran Non Tunai</div>
                        <h3 class="stat-number">
                            Rp {{ number_format($ringkasan['total_non_tunai'] ?? 0, 0, ',', '.') }}
                        </h3>
                    </div>
                </div>
            </div>
        </div>

    @endcan

    {{-- INVENTORY STATUS --}}
    <div class="section-header-custom">
        <span class="section-title-custom"><i class="fas fa-boxes-stacked me-2 text-danger"></i>Critical Inventory Status</span>
    </div>

    <div class="row g-4 mb-4">
        
        <div class="col-md-6">
            <div class="table-container">
                <div class="table-header-custom header-warning">
                    <span><i class="fas fa-exclamation-triangle me-2"></i>Stok Rendah</span>
                    <span class="badge bg-warning text-dark rounded-pill">{{ $produkStokRendah->count() }} Item</span>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th>Nama Produk</th>
                                <th style="width: 30%;" class="text-end">Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produkStokRendah as $index => $produk)
                                <tr>
                                    <td class="text-muted fw-bold">{{ $produkStokRendah->firstItem() + $index }}</td>
                                    <td class="fw-bold">{{ $produk->nama }}</td>
                                    <td class="text-end">
                                        <span class="badge-soft-warning">
                                            {{ $produk->stok }} Unit
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="fas fa-check-circle text-success me-1"></i> Semua stok aman
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="table-container">
                <div class="table-header-custom header-danger">
                    <span><i class="fas fa-circle-xmark me-2"></i>Stok Habis</span>
                    <span class="badge bg-danger text-white rounded-pill">{{ $produkStokHabis->count() }} Item</span>
                </div>
                <div class="table-responsive">
                    <table class="table custom-table align-middle">
                        <thead>
                            <tr>
                                <th style="width: 10%;">#</th>
                                <th>Nama Produk</th>
                                <th style="width: 30%;" class="text-end">Sisa Stok</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($produkStokHabis as $index => $produk)
                                <tr>
                                    <td class="text-muted fw-bold">{{ $produkStokHabis->firstItem() + $index }}</td>
                                    <td class="fw-bold">{{ $produk->nama }}</td>
                                    <td class="text-end">
                                        <span class="badge-soft-danger">
                                            Habis
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center text-muted py-4">
                                        <i class="fas fa-info-circle me-1"></i> Tidak ada stok habis
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>

    {{-- BEST SELLER PRODUCTS --}}
<div class="section-header-custom">
    <span class="section-title-custom">
        <i class="fas fa-fire me-2 text-danger"></i>
        Best Seller Products
    </span>
</div>

<div class="table-container mb-5">

    <div class="table-header-custom header-dark">
        <span>Produk Paling Laris</span>
        <i class="fas fa-trophy text-warning"></i>
    </div>

    <div class="table-responsive">
        <table class="table custom-table align-middle">
            <thead>
                <tr>
                    <th>Nama Produk</th>
                    <th style="width:25%;" class="text-center">
                        Sisa Stok Saat Ini
                    </th>
                    <th style="width:25%;" class="text-end">
                        Total Terjual
                    </th>
                </tr>
            </thead>
            <tbody>

                @forelse($produkTerlaris as $produk)
                    <tr>
                        <td class="fw-bold fs-6">
                            {{ $produk->nama }}
                        </td>
                        <td class="text-center">
                            <span class="fw-bold text-muted">
                                {{ $produk->stok }} Unit
                            </span>
                        </td>
                        <td class="text-end">
                            <span class="badge-soft-primary">
                                <i class="fas fa-bolt me-1"></i>
                                {{ $produk->total_terjual }} Terjual
                            </span>
                        </td>
                    </tr>

                @empty

                    <tr>
                        <td colspan="3" class="text-center text-muted py-4">
                            Belum ada data penjualan
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    {{-- PAGINATION DI BAWAH BEST SELLER --}}
</div>
@endsection=