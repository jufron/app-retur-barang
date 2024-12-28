<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use App\Models\DataLogistik;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Contract\DataLogistikServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\View\View;

class DataLogistikController extends Controller
{

    protected $dataLogistikService;

    /**
     * Create a new controller instance.
     *
     * @param DataLogistikServiceInterface $dataLogistikService
     */
    public function __construct(DataLogistikServiceInterface $dataLogistikService)
    {
        $this->dataLogistikService = $dataLogistikService;
    }


    public function index () : View
    {
        return view('dashboard.admin.data-logistik-manajement.index', [
            'dataLogistik'  => $this->dataLogistikService->getDataLogistik()
        ]);
    }

    public function show (DataLogistik $dataLogistik) : JsonResponse
    {
        return $this->dataLogistikService->showDataLogistik($dataLogistik);
    }
}
