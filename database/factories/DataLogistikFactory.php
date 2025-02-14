<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DataLogistik>
 */
class DataLogistikFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $userRoleLogistik = User::with([
            'roles'        => fn(MorphToMany $query) => $query->select('id', 'name'),
        ])
        ->whereHas('roles', function(Builder $query) {
            $query->where('name', 'logistik');
        })
        ->get();

        return [
            'tanggal'                   => fake()->date(),
            'no_nota_retur_barang'      => $this->generateRandomString(20),
            'nama_toko'                 => fake()->company(),
            'total_harga'               => fake()->numberBetween(10000, 1000000),
            'jumlah_barang'             => fake()->numberBetween(1, 100),
            'user_id'                   => $userRoleLogistik->random()->id
        ];
    }

    private function generateRandomString($length)
    {
        return Str::upper(Str::random($length));
    }
}
