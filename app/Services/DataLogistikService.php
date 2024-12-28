<?php


namespace App\Services;

use Illuminate\Support\Str;
use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Services\Contract\DataLogistikServiceInterface;

class DataLogistikService implements DataLogistikServiceInterface
{
    public function getDataLogistik () : Collection
    {
        return DataLogistik::query()->latest()->get();
    }

    public function creaateDataLogistik (Request $request) : void
    {
        $request->merge([
            'no_nota_retur_barang' => Str::upper(Str::random(20))
        ]);
        DataLogistik::create($request->all());
        notify()->success("Berhasil menambahkan data logistik");
    }

    public function showDataLogistik (DataLogistik $dataLogistik) : JsonResponse
    {
        if (!$dataLogistik) {
            return response()->json(null, 404);
        }

        return response()->json([
            'tanggal'                       => $dataLogistik->tanggal_format,
            'no_nota_retur_barang'          => $dataLogistik->no_nota_retur_barang,
            'nama_toko'                     => $dataLogistik->nama_toko,
            'total_harga'                   => $dataLogistik->total_harga_format,
            'jumlah_barang'                 => $dataLogistik->jumlah_barang_format,
            'created_at'                    => $dataLogistik->created_at,
            'updated_at'                    => $dataLogistik->updated_at
        ], 200);
    }

    public function updateDataLogistik (Request $request, DataLogistik $dataLogistik) : void
    {
        $dataLogistik->update($request->only(['tanggal', 'nama_toko', 'total_harga', 'jumlah_barang']));
        notify()->success("Berhasil mengubah data logistik");
    }
}
