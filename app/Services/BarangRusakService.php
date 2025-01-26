<?php


namespace App\Services;

use App\Models\Barang;
use App\Models\BarangRusak;
use App\Models\ReassonRetur;
use Illuminate\Http\Request;
use App\Traits\GeneratorRandom;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Services\Contract\BarangRusakServiceInterface;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Support\Facades\Log;

class BarangRusakService implements BarangRusakServiceInterface
{
    /**
     * Use GeneratorRandom trait
     */
    use GeneratorRandom;

    /**
     * Get all barang rusak with related data
     *
     * @return \Illuminate\Support\Collection
     */
    public function getBarangRusak() : Collection
    {
        return BarangRusak::with([
            'barang'        => fn (BelongsTo $query) => $query->select('id', 'nama_barang'),
            'user'          => fn (BelongsTo $query) => $query->select('id', 'name', 'username'),
            'reassonRetur'  => fn (BelongsTo $query) => $query->select('id', 'name')
        ])
        ->latest()
        ->get();
    }

    /**
     * Get all barang options
     *
     * @return \Illuminate\Support\Collection
     */
    public function getBarang () : Collection
    {
        return Barang::query()->pluck('id', 'kode_barcode');
    }

    /**
     * Get all reason retur options
     *
     * @return \Illuminate\Support\Collection
     */
    public function getReassonRetur () : Collection
    {
        return ReassonRetur::query()->pluck('id', 'name');
    }

    /**
     * Store new barang rusak
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function storeBarangRusak(Request $request) : void
    {
        $request->merge([
            'user_id'                   => auth()->user()->id
        ]);
        BarangRusak::create($request->except('barcode', 'search_terms'));
        notify()->success("Berhasil Menyimpan Kategory Barang");
    }

    /**
     * Get single barang rusak details
     *
     * @param \App\Models\BarangRusak $barangRusak
     * @return \Illuminate\Http\JsonResponse
     */
    public function showBarangRusak (BarangRusak $barangRusak) : JsonResponse
    {
        if (!$barangRusak) {
            return response()->json(null, 404);
        }

        $barangRusak->load(['reassonRetur', 'user', 'barang']);

        return response()->json([
            'nama_barang'               => $barangRusak->barang->nama_barang,
            'kategory_barang'           => $barangRusak->barang->kategory->name,
            'barcode'                   => $barangRusak->barang->kode_barcode,
            'nomor_nota_retur_barang'   => $barangRusak->nomor_nota_retur_barang,
            'quantity_pcs'              => $barangRusak->quantity_pcs_format,
            'quantity_carton'           => $barangRusak->quantity_carton_format,
            'tanggal_expired'           => $barangRusak->tanggal_expired_format,
            'tanggal_retur'             => $barangRusak->tanggal_retur_format,
            'reasson_retur'             => $barangRusak->reassonRetur->name,
            'nama_penginput'            => $barangRusak->user->name,
            'created_at'                => $barangRusak->created_at,
            'updated_at'                => $barangRusak->updated_at
        ], 200);
    }

    /**
     * Get data for editing barang rusak
     *
     * @param \App\Models\BarangRusak $barangRusak
     * @return \Illuminate\Support\Collection
     */
    public function editBarangRusak (BarangRusak $barangRusak) : Collection
    {
        $barangRusak->load(['reassonRetur', 'user', 'barang']);
        return ReassonRetur::query()->pluck('id', 'name');
    }

    /**
     * Update existing barang rusak
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\BarangRusak $barangRusak
     * @return void
     */
    public function updateBarangRusak (Request $request, BarangRusak $barangRusak) : void
    {
        $barangRusak->load(['reassonRetur', 'user']);
        $barangRusak->update($request->except('barcode', 'search_terms'));
        notify()->success("Berhasil Memperbaharui Kategory Barang");
    }

    /**
     * Search barang rusak by barcode
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function searchBarangRusak(Request $request): JsonResponse
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
