<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\ItemPenjualan;
use App\Models\Produk;

class ItemPenjualanFactory extends Factory
{
    protected $model = ItemPenjualan::class;

    public function definition(): array
    {
        $produk = Produk::inRandomOrder()->first();

        $qty = $this->faker->numberBetween(1, 10);

        return [
            'produk_id' => $produk?->id ?? 1,
            'kuantitas' => $qty,
            'harga_satuan' => $produk?->harga_jual ?? 0,
            'subtotal' => ($produk?->harga_jual ?? 0) * $qty,
        ];
    }
}