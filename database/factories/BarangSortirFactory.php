<?php

namespace Database\Factories;

use App\Models\Barang;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangSortir>
 */
class BarangSortirFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_nota_retur_barang'   => $this->faker->uuid,
            'barang_id'                 => Barang::inRandomOrder()->first()->id,
            'quantity_pcs'              => $this->faker->numberBetween(1, 100),
            'quantity_carton'           => $this->faker->numberBetween(1, 10),
            'tanggal_expired'           => $this->faker->dateTimeBetween('now', '+1 year'),
        ];
    }
}
