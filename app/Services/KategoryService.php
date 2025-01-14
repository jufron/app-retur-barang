<?php


namespace App\Services;

use App\Models\Kategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\CategoryServiceInterface;

class KategoryService implements CategoryServiceInterface
{
    public function getKategoryBarang () : Collection
    {
        return Kategory::query()->latest()->get();
    }

    public function createKategoryBarang (Request $request) : void
    {
        Kategory::create($request->all());
        notify()->success("Berhasil Menyimpan Kategory Barang");
    }

    public function showKategoryBarang (Kategory $kategory) : JsonResponse
    {
        if (!$kategory) {
            return response()->json(null, 404);
        }

        return response()->json([
            'nama'          => $kategory->name,
            'created_at'    => $kategory->created_at,
            'updated_at'    => $kategory->updated_at
        ], 200);
    }

    public function updateKategoryBarang (Request $request, Kategory $kategory) : void
    {
        $kategory->update($request->all());
        notify()->success("Berhasil Mengupdate Kategory Barang");
    }

    // public function generateUniqueCode(int $length = 6) : string
    // {
    //     do {
    //         // Generate kode acak
    //         $code = Str::upper(Str::random($length));
    //     } while (KategoryBarang::where('barcode_barang', $code)->exists()); // Cek apakah sudah ada di database
    //     return $code;
    // }
}
