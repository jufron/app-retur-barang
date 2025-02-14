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
    /**
     * Create a new controller instance.
     *
     * @param DataLogistikServiceInterface $dataLogistikService
     */
    public function __construct(
        protected DataLogistikServiceInterface $dataLogistikService)
    {

    }

    /**
     * Display a listing of the data logistik.
     *
     * @return \Illuminate\View\View
     */
    public function index () : View
    {
        return view('dashboard.admin.data-logistik-manajement.index', [
            'dataLogistik'  => $this->dataLogistikService->getDataLogistik()
        ]);
    }

    /**
     * Display the specified data logistik.
     *
     * @param  \App\Models\DataLogistik  $dataLogistik
     * @return \Illuminate\Http\JsonResponse
     */
    public function show (DataLogistik $dataLogistik) : JsonResponse
    {
        return $this->dataLogistikService->showDataLogistik($dataLogistik);
    }
}
