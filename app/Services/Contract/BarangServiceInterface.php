<?php

namespace App\Services\Contract;

use App\Models\Barang;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;

interface BarangServiceInterface
{
    /**
     * Get all barang data
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getBarang() : Collection;
    
    /**
     * CGet all kategory form
     * 
     * @return \Illuminate\Support\Collection
     */
    public function getKategory () : Collection;

    /**
     * Store new barang data
     * 
     * @param \Illuminate\Http\Client\Request $request
     * @return void
     */
    public function storeBarang (Request $request) : void;

    /**
     * Show specific barang data
     * 
     * @param \App\Models\Barang $barang
     * @return \Illuminate\Http\JsonResponse
     */
    public function showBarang (Barang $barang) : JsonResponse;

    /**
     * Update barang data
     * 
     * @param \Illuminate\Http\Client\Request $request
     * @param \App\Models\Barang $barang
     * @return void
     */
    public function updateBarang (Request $request, Barang $barang) : void;
}