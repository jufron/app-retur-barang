<?php

namespace Database\Seeders;

use App\Models\BarangSortir;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BarangSortirSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        BarangSortir::factory()->count(5)->create();
    }
}
