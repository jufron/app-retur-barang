<?php


namespace App\Services;

use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;
use App\Services\Contract\DataLogistikServiceInterface;

class DataLogistikService implements DataLogistikServiceInterface
{
    /**
     * Get all data logistik records ordered by latest
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDataLogistik () : Collection
    {
        return DataLogistik::with('user')->latest()->get();
    }

    /**
     * Create a new data logistik record
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function creaateDataLogistik (Request $request) : void
    {
        $request->merge(['user_id' => auth()->user()->id]);
        DataLogistik::create($request->all());
        notify()->success("Berhasil menambahkan data logistik");
    }

    /**
     * Get single data logistik record
     *
     * @param \App\Models\DataLogistik $dataLogistik
     * @return \Illuminate\Http\JsonResponse
     */
    public function showDataLogistik (DataLogistik $dataLogistik) : JsonResponse
    {
        if (!$dataLogistik) {
            return response()->json(null, 404);
        }

        return response()->json([
            'penginput'                     => $dataLogistik->user->name,
            'tanggal'                       => $dataLogistik->tanggal_format,
            'no_nota_retur_barang'          => $dataLogistik->no_nota_retur_barang,
            'nama_toko'                     => $dataLogistik->nama_toko,
            'total_harga'                   => $dataLogistik->total_harga,
            'jumlah_barang'                 => $dataLogistik->jumlah_barang,
            'created_at'                    => $dataLogistik->created_at,
            'updated_at'                    => $dataLogistik->updated_at
        ], 200);
    }

    /**
     * Update existing data logistik record
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataLogistik $dataLogistik
     * @return void
     */
    public function updateDataLogistik (Request $request, DataLogistik $dataLogistik) : void
    {
        $request->merge(['user_id' => auth()->user()->id]);
        $dataLogistik->update($request->all());
        notify()->success("Berhasil mengubah data logistik");
    }
}
