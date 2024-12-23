<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'admin-retur']);
        Role::create(['name' => 'logistik']);
        Role::create(['name' => 'warehouse-asisten']);
        Role::create(['name' => 'warehouse-retur']);
    }
}
