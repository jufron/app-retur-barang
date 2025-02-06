<?php

namespace App\Services;

use App\Models\Barang;
use App\Models\Kategory;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\Request;
use App\Services\Contract\BarangServiceInterface;

class BarangService implements BarangServiceInterface
{
    /**
     * Get all barang with their categories
     *
     * @return \Illuminate\Support\Collection
     */
    public function getBarang () : Collection
    {
        return Barang::with(['kategory'])
        ->latest()
        ->get();
    }

    /**
     * Get categories for barang creation form
     *
     * @return \Illuminate\Support\Collection
     */
    public function getKategory () : Collection
    {
        return Kategory::pluck('id', 'name');
    }

    /**
     * Store a new barang
     *
     * @param \Illuminate\Http\Client\Request $request
     * @return void
     */
    public function storeBarang (Request $request) : void
    {
        Barang::create($request->all());
        notify()->success("Berhasil Menyimpan Barang");
    }

    /**
     * Get details of specific barang
     *
     * @param \App\Models\Barang $barang
     * @return \Illuminate\Http\JsonResponse
     */
    public function showBarang (Barang $barang) : JsonResponse
    {
        $barang->load(['kategory']);

        if (!$barang) {
            return response()->json(null, 404);
        }

        return response()->json([
            'nama'              => $barang->kode_barcode,
            'kode_barcode'      => $barang->kode_barcode,
            'kategory'          => $barang->kategory->name,
            'deskripsi_barang'  => $barang->deskripsi_barang,
            'created_at'        => $barang->created_at,
            'updated_at'        => $barang->updated_at
        ], 200);
    }

    /**
     * Update existing barang
     *
     * @param \Illuminate\Http\Client\Request $request
     * @param \App\Models\Barang $barang
     * @return void
     */
    public function updateBarang (Request $request, Barang $barang) : void
    {
        $barang->update($request->all());
        notify()->success("Berhasil Mengupdate Barang");
    }
}
