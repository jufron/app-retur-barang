<?php

namespace Database\Seeders;

use App\Models\Kategory;
use App\Models\KategoryBarang;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name'  => 'Makanan dan Minuman'],
            ['name'  => 'Peralatan Rumah'],
            ['name'  => 'Mainan Anak'],
        ])->each(function ($kategory) {
            Kategory::create($kategory);
        });
    }
}
