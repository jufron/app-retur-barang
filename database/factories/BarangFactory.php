<?php

namespace Database\Factories;

use App\Models\Kategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kode_barcode'      => $this->faker->unique()->ean13(),
            'nama_barang'       => $this->faker->words(3, true),
            'kategory_id'       => Kategory::inRandomOrder()->first()->id,
            'deskripsi_barang'  => $this->faker->sentence(10),
        ];
    }
}
