<?php


namespace App\Services\Contract;

use App\Models\Kategory;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface CategoryServiceInterface
{
    /**
     * Get all categories
     * @return Collection
     */
    public function getKategoryBarang () : Collection;

    /**
     * Create new category
     * @param Request $request
     * @return void
     */
    public function createKategoryBarang (Request $request) : void;

    /**
     * Show specific category
     * @param Kategory $kategory
     * @return JsonResponse
     */
    public function showKategoryBarang (Kategory $kategory) : JsonResponse;

    /**
     * Update specific category
     * @param Request $request
     * @param Kategory $kategory
     * @return void
     */
    public function updateKategoryBarang (Request $request, Kategory $kategory) : void;
}
