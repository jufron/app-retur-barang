<?php

namespace App\Services\Contract;

use App\Models\BarangRusak;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface BarangRusakServiceInterface
{
    /**
     * Get collection of barang rusak
     * @return Collection
     */
    public function getBarangRusak () : Collection;

    /**
     * Get collection of retur reasons
     * @return Collection
     */
    public function getReassonRetur () : Collection;

    /**
     * Get collection of barang
     * @return Collection
     */
    public function getBarang () : Collection;

    /**
     * Store barang rusak data
     * @param Request $request
     * @return void
     */
    public function storeBarangRusak (Request $request) : void;

    /**
     * Show specific barang rusak
     * @param BarangRusak $barangRusak
     * @return JsonResponse
     */
    public function showBarangRusak (BarangRusak $barangRusak) : JsonResponse;

    /**
     * Edit specific barang rusak
     * @param BarangRusak $barangRusak
     * @return Collection
     */
    public function editBarangRusak (BarangRusak $barangRusak) : Collection;

    /**
     * Update specific barang rusak
     * @param Request $request
     * @param BarangRusak $barangRusak
     * @return void
     */
    public function updateBarangRusak (Request $request, BarangRusak $barangRusak) : void;

    /**
      * Search barang rusak data
      * @param Request $request
      * @return JsonResponse
      */
    public function searchBarangRusak (Request $request) : JsonResponse;
}
