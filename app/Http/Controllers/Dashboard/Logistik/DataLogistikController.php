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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('dashboard.logistik.data-logistik-manajement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\DataLogistikRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(DataLogistikRequest $request) : RedirectResponse
    {
        $this->dataLogistikService->creaateDataLogistik($request);
        return redirect()->route('logistik.data-logistik.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DataLogistik  $dataLogistik
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(DataLogistik $dataLogistik) : JsonResponse
    {
        return $this->dataLogistikService->showDataLogistik($dataLogistik);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DataLogistik  $dataLogistik
     * @return \Illuminate\View\View
     */
    public function edit(DataLogistik $dataLogistik) : View
    {
        return view('dashboard.logistik.data-logistik-manajement.edit', [
            'dataLogistik' => $dataLogistik
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DataLogistik  $dataLogistik
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, DataLogistik $dataLogistik) :  RedirectResponse
    {
        $this->dataLogistikService->updateDataLogistik($request, $dataLogistik);
        return redirect()->route('logistik.data-logistik.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DataLogistik  $dataLogistik
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(DataLogistik $dataLogistik) : RedirectResponse
    {
        $dataLogistik->delete();
        notify()->success("Berhasil Menghapus Data Logistik");
        return redirect()->route('logistik.data-logistik.index');
    }
}
