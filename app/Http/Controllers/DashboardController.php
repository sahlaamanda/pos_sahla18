<?php

namespace App\Http\Controllers;

use App\Services\LaporanPenjualanService;
use App\Services\MonitoringStokService;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    protected $laporanService;
    protected $stokService;


    public function __construct(
        LaporanPenjualanService $laporanService,
        MonitoringStokService $stokService
    ) {
        $this->laporanService = $laporanService;
        $this->stokService = $stokService;
    }


    public function index()
    {
        // Ringkasan penjualan hari ini
        $ringkasan = $this->laporanService->ringkasanHariIni();


        // Produk paling laris (pagination best_seller)
        $produkTerlaris = $this->laporanService
            ->produkTerlarisHariIni(5);


        // Monitoring stok
        $produkStokRendah = $this->stokService
            ->produkStokRendah();


        $produkStokHabis = $this->stokService
            ->produkStokHabis();



        return view('dashboard', [

            'ringkasan' => [
                'total_penjualan'  => $ringkasan['total_penjualan'] ?? 0,
                'jumlah_transaksi' => $ringkasan['total_transaksi'] ?? 0,
                'total_cash'       => $ringkasan['total_cash'] ?? 0,
                'total_non_tunai'  => $ringkasan['total_non_tunai'] ?? 0,
            ],


            'produkTerlaris'   => $produkTerlaris,
            'produkStokRendah' => $produkStokRendah,
            'produkStokHabis'  => $produkStokHabis,


            'tanggalHariIni' => Carbon::now(),

        ]);
    }
}