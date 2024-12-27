<?php


namespace App\Services;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\KategoryBarang;
use Illuminate\Support\Collection;
use App\Services\Contract\CategoryBarangServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;

class CategoryBarangService implements CategoryBarangServiceInterface
{
    public function getKategoryBarang () : Collection
    {
        return KategoryBarang::query()->latest()->get();
    }

    public function createKategoryBarang (Request $request) : void
    {
        KategoryBarang::create([
            'nama_barang'           => $request->nama_barang,
            'barcode_barang'        => $this->generateUniqueCode(),
            'kategory_barang'       => $request->kategory_barang,
        ]);
        notify()->success("Berhasil Menyimpan Kategory Barang");
    }

    public function showKategoryBarang (KategoryBarang $kategoryBarang) : JsonResponse
    {
        if (!$kategoryBarang) {
            return response()->json(null, 404);
        }

        return response()->json([
            'nama_barang'           => $kategoryBarang->nama_barang,
            'barcode_code'          => $kategoryBarang->barcode_barang,
            'barcode'               => $kategoryBarang->barcode_barang_generate,
            'kategory_barang'       => $kategoryBarang->kategory_barang,
            'created_at'            => $kategoryBarang->created_at,
            'updated_at'            => $kategoryBarang->updated_at
        ], 200);
    }

    public function updateKategoryBarang (Request $request, KategoryBarang $kategoryBarang) : void
    {
        $kategoryBarang->update([
            'nama_barang'           => $request->nama_barang,
            'kategory_barang'       => $request->kategory_barang,
        ]);
        notify()->success("Berhasil Mengupdate Kategory Barang");
    }

    public function generateUniqueCode(int $length = 6) : string
    {
        do {
            // Generate kode acak
            $code = Str::upper(Str::random($length));
        } while (KategoryBarang::where('barcode_barang', $code)->exists()); // Cek apakah sudah ada di database
        return $code;
    }
}
