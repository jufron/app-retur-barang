<?php

namespace App\Services\Contract;

use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface DataLogistikServiceInterface
{
    public function getDataLogistik () : Collection;

    public function creaateDataLogistik (Request $request) : void;

    public function showDataLogistik (DataLogistik $dataLogistik) : JsonResponse;

    public function updateDataLogistik (Request $request, DataLogistik $dataLogistik) : void;
}
