<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            ReassonReturSeeder::class,
            KategorySeeder::class,
            BarangSeeder::class,
            BarangRusakSeeder::class,
            DataLogistikSeeder::class,
            // barangsortir
        ]);

        $user1 = User::query()->where('name', 'ahoo')->first();
        $user1->assignRole('admin-retur');

        $user2 = User::query()->where('name', 'erik')->first();
        $user2->assignRole('logistik');

        $user3 = User::query()->where('name', 'andi')->first();
        $user3->assignRole('warehouse-asisten');

        $user4 = User::query()->where('name', 'sovi')->first();
        $user4->assignRole('warehouse-retur');
    }
}
