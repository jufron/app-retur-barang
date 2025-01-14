<?php

namespace Database\Factories;

use App\Models\Barang;
use App\Models\ReassonRetur;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BarangRusak>
 */
class BarangRusakFactory extends Factory
{
    /**
     * D    efine the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nomor_nota_retur_barang'   => $this->faker->uuid,
            'quantity_pcs'              => $this->faker->numberBetween(1, 100),
            'quantity_carton'           => $this->faker->numberBetween(1, 10),
            'tanggal_expired'           => $this->faker->dateTimeBetween('now', '+1 year'),
            'tanggal_retur'             => $this->faker->date(),
            'barang_id'                 => Barang::inRandomOrder()->first()->id,
            'reasson_retur_id'          => ReassonRetur::inRandomOrder()->first()->id,
            'user_id'                   => User::role('warehouse-retur')->inRandomOrder()->first()->id,
        ];
    }
}
