<?php

namespace App\Services\Contract;

use App\Models\BarangSortir;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface BarangSortirServiceInterface
{
    /**
     * Get collection of barang sortir
     * @return Collection
     */
    public function getBarangSortir () : Collection;

    /**
     * Get collection of barang
     * @return Collection
     */
    public function getBarang () : Collection;

    /**
     * Store new barang sortir
     * @param Request $request
     * @return void
     */
    public function storeBarangSortir (Request $request) : void;

    /**
     * Show specific barang sortir
     * @param BarangSortir $barangSortir
     * @return JsonResponse
     */
    public function showBarangSortir (BarangSortir $barangSortir) : JsonResponse;

    /**
     * Get barang sortir data for edit
     * @param BarangSortir $barangSortir
     * @return Collection
     */
    // public function editBarangSortir (BarangSortir $barangSortir) : Collection;

    /**
     * Update existing barang sortir
     * @param Request $request
     * @param BarangSortir $barangSortir
     * @return void
     */
    public function updateBarangSortir (Request $request, BarangSortir $barangSortir) : void;

    /**
     * Search for damaged goods
     * @param Request $request
     * @return JsonResponse
     */
    public function searchBarangSortir (Request $request): JsonResponse;

}
