<?php

namespace App\Http\Controllers\Dashboard\WarehouseAsisten;

use Illuminate\View\View;
use App\Models\BarangSortir;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\BarangSortirRequest;
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index() : View
    {
        return view('dashboard.warehouse-asisten.barang-sortir-manajement.index', [
            'barangSortir' => $this->barangSortirService->getBarangSortir()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create() : View
    {
        return view('dashboard.warehouse-asisten.barang-sortir-manajement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\BarangSortirRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(BarangSortirRequest $request) : RedirectResponse
    {
        $this->barangSortirService->storeBarangSortir($request);
        return redirect()->route('wa.barang-sortir.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(BarangSortir $barangSortir) : JsonResponse
    {
        return $this->barangSortirService->showBarangSortir($barangSortir);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\View\View
     */
    public function edit(BarangSortir $barangSortir) : View
    {
        return view('dashboard.warehouse-asisten.barang-sortir-manajement.edit', compact('barangSortir'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\BarangSortirRequest  $request
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(BarangSortirRequest $request, BarangSortir $barangSortir) : RedirectResponse
    {
        $this->barangSortirService->updateBarangSortir($request, $barangSortir);
        return redirect()->route('wa.barang-sortir.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BarangSortir  $barangSortir
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(BarangSortir $barangSortir) : RedirectResponse
    {
        $barangSortir->delete();
        notify()->success("Berhasil Menghapus Barang Sortir");
        return redirect()->route('wa.barang-sortir.index');
    }

    /**
     * Search for specific resources in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function search(Request $request) : JsonResponse
    {
        return $this->barangSortirService->searchBarangSortir($request);
    }
}
