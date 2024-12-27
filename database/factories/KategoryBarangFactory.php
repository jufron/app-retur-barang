<?php

namespace Database\Factories;

use App\Models\KategoryBarang;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\KategoryBarang>
 */
class KategoryBarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama_barang'       => $this->faker->word,
            'barcode_barang'    => $this->generateUniqueBarcode(),
            'kategory_barang'   => $this->faker->randomElement(['Elektronik', 'Pakaian', 'Makanan', 'Perabot', 'Buku']), // Kategori acak
        ];
    }

    private function generateUniqueBarcode()
    {
        do {
            $barcode = Str::upper(Str::random(6));
        } while (KategoryBarang::where('barcode_barang', $barcode)->exists()); // Pastikan unik di database
        return $barcode;
    }
}
