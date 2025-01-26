<?php

namespace App\Services\Contract;

use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface DataLogistikServiceInterface
{
    /**
     * Get all data logistik
     *
     * @return \Illuminate\Support\Collection
     */
    public function getDataLogistik () : Collection;

    /**
     * Create new data logistik
     *
     * @param \Illuminate\Http\Request $request
     * @return void
     */
    public function creaateDataLogistik (Request $request) : void;

    /**
     * Get single data logistik
     *
     * @param \App\Models\DataLogistik $dataLogistik
     * @return \Illuminate\Http\JsonResponse
     */
    public function showDataLogistik (DataLogistik $dataLogistik) : JsonResponse;

    /**
     * Update existing data logistik
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\DataLogistik $dataLogistik
     * @return void
     */
    public function updateDataLogistik (Request $request, DataLogistik $dataLogistik) : void;
}
