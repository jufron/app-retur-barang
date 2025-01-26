<?php

namespace App\Services;

use App\Models\Barang;
use App\Models\BarangSortir;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;
use App\Services\Contract\BarangSortirServiceInterface;

class BarangSortirService implements BarangSortirServiceInterface
{
    /**
     * Get collection of sorted items
     *
     * @return \Illuminate\Support\Collection
     */
    public function getBarangSortir(): Collection
    {
        return BarangSortir::query()->latest()->get();
    }

    /**
     * Get collection of items with ID and barcode
     *
     * @return \Illuminate\Support\Collection
     */
    public function getBarang(): Collection
    {
        return BarangSortir::query()->pluck('id', 'kode_barcode');
    }

    /**
     * Store new sorted item
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function storeBarangSortir (Request $request): void
    {
        BarangSortir::create($request->all());
        notify()->success("Berhasil Menyimpan Barang Sortir");
    }

    /**
     * Get detailed information of specific sorted item
     *
     * @param \App\Models\BarangSortir $barangSortir
     * @return \Illuminate\Http\JsonResponse
     */
    public function showBarangSortir(BarangSortir $barangSortir): JsonResponse
    {
        if (!$barangSortir) {
            return response()->json(null, 404);
        }

        $barangSortir->load(['barang.kategory']);

        return response()->json([
            'nama_barang'               => $barangSortir->barang->nama_barang,
            'kategory_barang'           => $barangSortir->barang->kategory->name,
            'barcode'                   => $barangSortir->barang->kode_barcode,
            'nomor_nota_retur_barang'   => $barangSortir->nomor_nota_retur_barang,
            'quantity_pcs'              => $barangSortir->quantity_pcs_format,
            'quantity_carton'           => $barangSortir->quantity_carton_format,
            'tanggal_expired'           => $barangSortir->tanggal_expired_format,
            'created_at'                => $barangSortir->created_at,
            'updated_at'                => $barangSortir->updated_at
        ], 200);
    }

    /**
     * Update existing sorted item
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BarangSortir $barangSortir
     * @return void
     */
    public function updateBarangSortir (Request $request, BarangSortir $barangSortir) : void
    {
        $barangSortir->update($request->all());
        notify()->success("Berhasil Memperbaharui Barang Sortir");
    }

    /**
     * Search for damaged items
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBarangSortir (Request $request): JsonResponse
    {
        $search = $request->query('keyword');

        Log::info('keyword : ' . $search);

        $Barang = Barang::with(['kategory:id,name'])
        ->where('kode_barcode', $search)
        ->latest()
        ->first();

        if (!$Barang) {
            return response()->json([
                'message'   => 'Barang tidak ditemukan',
                'data'      => null
            ], 404);
        }

        return response()->json([
            'message'   => 'Barang berhasil ditemukan',
            'data'      => [
                'id'            => $Barang->id,
                'kode_barcode'  => $Barang->kode_barcode,
                'nama_barang'   => $Barang->nama_barang,
                'kategory'      => $Barang->kategory->name
            ]
        ], 200);
    }
}
