<?php

namespace Database\Factories;

use App\Models\ReassonRetur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangRusak>
 */
class BarangRusakFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang'               => $this->faker->word,
            'barcode'                   => $this->faker->unique()->ean13,
            'nomor_nota_retur_barang'   => $this->faker->uuid,
            'quantity_pcs'              => $this->faker->numberBetween(1, 100),
            'quantity_carton'           => $this->faker->numberBetween(1, 10),
            'tanggal_expired'           => $this->faker->dateTimeBetween('now', '+1 year'),
            'tanggal_retur'             => $this->faker->date(),
            'reasson_retur_id'          => ReassonRetur::inRandomOrder()->first()->id,
            'user_id'                   => User::role('warehouse-retur')->inRandomOrder()->first()->id, // Mengambil user_id dari role tertentu
        ];
    }
}
