<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use App\Models\KategoryBarang;
use App\Http\Controllers\Controller;
use App\Http\Requests\KategoryBarangRequest;
use App\Services\Contract\CategoryBarangServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class CategoryBarangController extends Controller
{
    protected $categoryBarangService;

    public function __construct(CategoryBarangServiceInterface $categoryBarangService)
    {
        $this->categoryBarangService = $categoryBarangService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.index', [
            'kategoryBarang'    => $this->categoryBarangService->getKategoryBarang()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(KategoryBarangRequest $request) : RedirectResponse
    {
        $this->categoryBarangService->createKategoryBarang($request);
        return redirect()->route('wr.kategory-barang.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(KategoryBarang $kategoryBarang) : JsonResponse
    {
        return $this->categoryBarangService->showKategoryBarang($kategoryBarang);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(KategoryBarang $kategoryBarang) : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.edit', compact('kategoryBarang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(KategoryBarangRequest $request, KategoryBarang $kategoryBarang) : RedirectResponse
    {
        $this->categoryBarangService->updateKategoryBarang($request, $kategoryBarang);
        return redirect()->route('wr.kategory-barang.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(KategoryBarang $kategoryBarang) : RedirectResponse
    {
        $kategoryBarang->delete();
        notify()->success("Berhasil Menghapus Kategory Barang");
        return redirect()->route('wr.kategory-barang.index');
    }
}
