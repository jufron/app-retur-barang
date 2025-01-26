<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use Illuminate\View\View;
use App\Models\BarangSortir;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangSortirRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\BarangSortirServiceInterface;

class BarangSortirController extends Controller
{
    /**
     * @var BarangSortirServiceInterface
    */
    protected BarangSortirServiceInterface $barangSortirService;

    /**
    * Constructor
    *
    * @param BarangSortirServiceInterface $barangSortirService
    */
    public function __construct(BarangSortirServiceInterface $barangSortirService)
    {
        $this->barangSortirService = $barangSortirService;
    }

    /**
    * Display a listing of barang sortir.
    *
    * @return \Illuminate\View\View
    */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.barang-sortir-manajement.index', [
            'barangSortir' => $this->barangSortirService->getBarangSortir()
        ]);
    }

    /**
    * Show the form for creating a new barang sortir.
    *
    * @return \Illuminate\View\View
    */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.barang-sortir-manajement.create');
    }

    /**
     * Store a newly created barang sortir in storage.
     *
     * @param  \App\Http\Requests\BarangSortirRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception When storage operation fails
     */
    public function store(BarangSortirRequest $request) : RedirectResponse
    {
        $this->barangSortirService->storeBarangSortir($request);
        return redirect()->route('wr.barang-sortir.index');
    }

    /**
     * Display the specified barang sortir.
     *
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\Http\JsonResponse
    */
    public function show(BarangSortir $barangSortir) : JsonResponse
    {
        return $this->barangSortirService->showBarangSortir($barangSortir);
    }

    /**
     * Show the form for editing the specified barang sortir.
     *
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\View\View
    */
    public function edit(BarangSortir $barangSortir) : View
    {
        return view('dashboard.warehouse-retur.barang-sortir-manajement.edit', compact('barangSortir'));
    }

    /**
    * Update the specified barang sortir in storage.
    *
    * @param  \App\Http\Requests\BarangSortirRequest  $request
    * @param  \App\Models\BarangSortir  $barangSortir
    * @return \Illuminate\Http\RedirectResponse
    * @throws \Exception When update operation fails
    */
    public function update(BarangSortirRequest $request, BarangSortir $barangSortir) : RedirectResponse
    {
        $this->barangSortirService->updateBarangSortir($request, $barangSortir);
        return redirect()->route('wr.barang-sortir.index');
    }

    /**
    * Remove the specified barang sortir from storage.
    *
    * @param  \App\Models\BarangSortir  $barangSortir
    * @return \Illuminate\Http\RedirectResponse
    */
    public function destroy(BarangSortir $barangSortir) : RedirectResponse
    {
        $barangSortir->delete();
        notify()->success("Berhasil Menghapus Barang Sortir");
        return redirect()->route('wr.barang-sortir.index');
    }

    /**
    * Search for barang sortir.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\JsonResponse
    */
    public function search (Request $request) : JsonResponse
    {
        return $this->barangSortirService->searchBarangSortir($request);
    }
}
