<?php

namespace Database\Seeders;

use App\Models\ReassonRetur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReassonReturSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        collect([
            ['name' => 'Retur Barang Rusak (Expired)'],
            ['name' => 'Retur Barang Baik (Removall)'],
            ['name' => 'Retur Barang Baik (Ganti Kemasan)'],
            ['name' => 'Retur Barang Baik (Product Recall)'],
            ['name' => 'Retur Barang Baik (Over Stock)'],
            ['name' => 'Retur Barang Baik (Delisting)'],
            ['name' => 'Retur Barang Baik (Discontinued)'],
            ['name' => 'Retur Barang Baik (Product Relaunch)'],
            ['name' => 'Retur Konsinyasi'],
            ['name' => 'Retur Barang Rusak Kemasan Luar'],
            ['name' => 'Retur Barang Rusak Kemasan Dalam'],
            ['name' => 'Retur Near ED'],
            ['name' => 'Beda Barcode'],
            ['name' => 'Beda Banded - Cold Chain'],
            ['name' => 'Beda Expired Ex Banded - Cold Chain'],
        ])->each( function ($item) {
            ReassonRetur::create($item);
        });
    }
}
