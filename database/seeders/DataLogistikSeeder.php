<?php

namespace Database\Seeders;

use App\Models\DataLogistik;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DataLogistikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DataLogistik::factory()->count(10)->create();
    }
}
