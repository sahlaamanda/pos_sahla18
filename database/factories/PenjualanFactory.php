<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Penjualan;
use App\Models\User;

class PenjualanFactory extends Factory
{
    protected $model = Penjualan::class;

    public function definition(): array
    {
        return [
            'user_id' => User::inRandomOrder()->value('id') ?? 1,

            // akan diupdate oleh seeder setelah item dihitung
            'total_pembayaran' => 0,

            'metode_pembayaran' => $this->faker->randomElement([
                'CASH',
                'TRANSFER',
                'QRIS',
            ]),

            'status' => $this->faker->randomElement([
                'OPEN',
                'COMPLETED',
            ]),

            // optional tapi bagus untuk POS
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}