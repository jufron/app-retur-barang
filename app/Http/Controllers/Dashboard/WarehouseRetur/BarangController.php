<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use App\Models\Barang;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\BarangServiceInterface;

class BarangController extends Controller
{
    /**
     * @var BarangServiceInterface
     */
    protected BarangServiceInterface $barangService;

    /**
     * * Create a new controller instance.
     *
     * @param BarangServiceInterface $barangService
     */
    public function __construct(BarangServiceInterface $barangService)
    {
        $this->barangService = $barangService;
    }

    /**
     * * Display a listing of the resource.
    *
    * @return \Illuminate\View\View
    */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.data-barang-manajement.index', [
            'barang'    => $this->barangService->getBarang()
        ]);
    }

    /**
     * * Show the form for creating a new resource.
    *
    * @return \Illuminate\View\View
    */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.data-barang-manajement.create', [
            'kategory'  => $this->barangService->getKategory()
        ]);
    }

    /**
     * * Store a newly created resource in storage.
    *
    * @param \App\Http\Requests\BarangRequest $request
    * @return \Illuminate\Http\RedirectResponse
    */
    public function store(BarangRequest $request) : RedirectResponse
    {
        $this->barangService->storeBarang($request);
        return redirect()->route('wr.barang.index');
    }

    /**
     * * Display the specified resource.
    *
    * @param \App\Models\Barang $barang
    * @return \Illuminate\Http\JsonResponse
    */
    public function show(Barang $barang) : JsonResponse
    {
        return $this->barangService->showBarang($barang);
    }

    /**
     * * Show the form for editing the specified resource.
    *
    * @param \App\Models\Barang $barang
    * @return \Illuminate\View\View
    */
    public function edit(Barang $barang) : View
    {
        return view('dashboard.warehouse-retur.data-barang-manajement.edit', [
            'barang'    => $barang,
            'kategory'  => $this->barangService->getKategory()
        ]);
    }

    /**
     * * Update the specified resource in storage.
    *
    * @param \App\Http\Requests\BarangRequest $request
    * @param \App\Models\Barang $barang
    * @return \Illuminate\Http\RedirectResponse
    */
    public function update(BarangRequest $request, Barang $barang) : RedirectResponse
    {
        $this->barangService->updateBarang($request, $barang);
        notify()->success("Berhasil Mengupdate Barang");
        return redirect()->route('wr.barang.index');
    }

    /**
     * * Remove the specified resource from storage.
    *
    * @param \App\Models\Barang $barang
    * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(Barang $barang) : RedirectResponse
    {
        $barang->delete();
        notify()->success("Berhasil Menghapus Barang");
        return redirect()->route('wr.barang.index');
    }
}
