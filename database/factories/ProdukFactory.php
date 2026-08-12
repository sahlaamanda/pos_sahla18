<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Produk;
use App\Models\User;

/**
 * @extends Factory<Produk>
 */
class ProdukFactory extends Factory
{
    protected $model = Produk::class;

    public function definition(): array
    {
        $hargaBeli = $this->faker->numberBetween(10000, 500000);

        return [
            'user_id' => User::where('role_id', 1)->inRandomOrder()->value('id') ?? 1,
            'foto' => 'produk/' . $this->faker->uuid() . '.jpg',
            'nama' => $this->faker->words(3, true),
            'harga_beli' => $hargaBeli,
            'harga_jual' => $hargaBeli + $this->faker->numberBetween(5000, 100000),
            'stok' => $this->faker->numberBetween(1, 500),
        ];
    }
}