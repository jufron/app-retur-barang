<?php


namespace App\Services;

use App\Models\BarangRusak;
use App\Models\ReassonRetur;
use Illuminate\Http\Request;
use App\Traits\GeneratorRandom;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Services\Contract\BarangRusakServiceInterface;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphToMany;

class BarangRusakService implements BarangRusakServiceInterface
{
    use GeneratorRandom;

    public function getBarangRusak() : Collection
    {
        return BarangRusak::with([
            'user'          => fn(BelongsTo $query) => $query->select('id', 'name', 'username'),
            'reassonRetur'  => fn (BelongsTo $query) => $query->select('id', 'name')
        ])
        ->latest()
        ->get();
    }

    public function createBarangRusak () : Collection
    {
        return ReassonRetur::query()->pluck('id', 'name');
    }

    public function storeBarangRusak(Request $request) : void
    {
        $request->merge([
            'nomor_nota_retur_barang'   => $this->generateStringAndNumberRandom(),
            'user_id'                   => auth()->user()->id
        ]);
        BarangRusak::create($request->all());
        notify()->success("Berhasil Menyimpan Kategory Barang");
    }

    public function showBarangRusak (BarangRusak $barangRusak) : JsonResponse
    {
        if (!$barangRusak) {
            return response()->json(null, 404);
        }

        $barangRusak->load(['reassonRetur', 'user']);

        return response()->json([
            'nama_barang'               => $barangRusak->nama_barang,
            'barcode'                   => $barangRusak->barcode,
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

    public function editBarangRusak (BarangRusak $barangRusak) : Collection
    {
        $barangRusak->load(['reassonRetur', 'user']);
        return ReassonRetur::query()->pluck('id', 'name');
    }

    public function updateBarangRusak (Request $request, BarangRusak $barangRusak) : void
    {
        $barangRusak->load(['reassonRetur', 'user']);
        $barangRusak->update($request->all());
        notify()->success("Berhasil Menyimpan Kategory Barang");
    }
}
