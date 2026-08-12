<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Penjualan;
use App\Models\ItemPenjualan;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    public function run(): void
    {
        DB::transaction(function () {

            Penjualan::factory()
                ->count(50)
                ->create()
                ->each(function ($penjualan) {

                    // buat item penjualan
                    $items = ItemPenjualan::factory()
                        ->count(rand(1, 5))
                        ->make([
                            'penjualan_id' => $penjualan->id,
                        ]);

                    // hitung total dari subtotal item
                    $total = $items->sum('subtotal');

                    // simpan semua item ke database
                    $penjualan->itemPenjualan()->saveMany($items);

                    // update total penjualan
                    $penjualan->update([
                        'total_pembayaran' => $total,
                    ]);
                });
        });
    }
}