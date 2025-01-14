<?php

namespace Database\Seeders;

use App\Models\BarangRusak;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangRusakSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangRusak::factory()->count(5)->create();
    }
}
