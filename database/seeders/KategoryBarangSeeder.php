<?php

namespace Database\Seeders;

use App\Models\KategoryBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoryBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        KategoryBarang::factory()->count(10)->create();
    }
}
