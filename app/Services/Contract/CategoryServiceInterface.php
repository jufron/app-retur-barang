<?php


namespace App\Services\Contract;

use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface CategoryServiceInterface
{
    public function getKategoryBarang () : Collection;

    public function createKategoryBarang (Request $request) : void;

    public function showKategoryBarang (Kategory $kategory) : JsonResponse;

    public function updateKategoryBarang (Request $request, Kategory $kategory) : void;

}
