<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name'          => 'ahoo',
            'username'      => '@ahoo',
            'email'         =>  'ahoo@mail.com',
            'password'      => '12345678'
        ]);
        User::create([
            'name'          => 'erik',
            'username'      => '@erik',
            'email'         =>  'erik@mail.com',
            'password'      => '12345678'
        ]);
        User::create([
            'name'          => 'andi',
            'username'      => '@andi',
            'email'         =>  'andi@mail.com',
            'password'      => '12345678'
        ]);
        User::create([
            'name'          => 'sovi',
            'username'      => '@sovi',
            'email'         => 'sovi@mail.com',
            'password'      => '12345678'
        ]);
    }
}
