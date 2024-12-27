<?php


namespace App\Services\Contract;

use Illuminate\Http\Request;
use App\Models\KategoryBarang;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface CategoryBarangServiceInterface
{
    public function getKategoryBarang () : Collection;

    public function createKategoryBarang (Request $request) : void;

    public function showKategoryBarang (KategoryBarang $kategoryBarang) : JsonResponse;

    public function updateKategoryBarang (Request $request, KategoryBarang $kategoryBarang) : void;

    public function generateUniqueCode(int $length = 6) : string;

}
