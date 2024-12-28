<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataLogistik>
 */
class DataLogistikFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tanggal'                   => fake()->date(),
            'no_nota_retur_barang'      => $this->generateRandomString(20),
            'nama_toko'                 => fake()->company(),
            'total_harga'               => fake()->numberBetween(10000, 1000000),
            'jumlah_barang'             => fake()->numberBetween(1, 100)
        ];
    }

    private function generateRandomString($length)
    {
        return Str::upper(Str::random($length));
    }
}
