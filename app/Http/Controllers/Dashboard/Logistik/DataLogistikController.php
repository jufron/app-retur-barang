<?php

namespace App\Http\Controllers\Dashboard\Logistik;

use Illuminate\View\View;
use App\Models\DataLogistik;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\DataLogistikRequest;
use App\Services\Contract\DataLogistikServiceInterface;

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

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        return view('dashboard.logistik.data-logistik-manajement.index', [
            'dataLogistik'  => $this->dataLogistikService->getDataLogistik()
        ]);
    }

    public function create() : View
    {
        return view('dashboard.logistik.data-logistik-manajement.create');
    }

    public function store(DataLogistikRequest $request) : RedirectResponse
    {
        $this->dataLogistikService->creaateDataLogistik($request);
        return redirect()->route('logistik.data-logistik.index');
    }

    public function show(DataLogistik $dataLogistik) : JsonResponse
    {
        return $this->dataLogistikService->showDataLogistik($dataLogistik);
    }

    public function edit(DataLogistik $dataLogistik) : View
    {
        return view('dashboard.logistik.data-logistik-manajement.edit', [
            'dataLogistik' => $dataLogistik
        ]);
    }

    public function update(Request $request, DataLogistik $dataLogistik) :  RedirectResponse
    {
        $this->dataLogistikService->updateDataLogistik($request, $dataLogistik);
        return redirect()->route('logistik.data-logistik.index');
    }

    public function destroy(DataLogistik $dataLogistik) : RedirectResponse
    {
        $dataLogistik->delete();
        notify()->success("Berhasil Menghapus Data Logistik");
        return redirect()->route('logistik.data-logistik.index');
    }
}
