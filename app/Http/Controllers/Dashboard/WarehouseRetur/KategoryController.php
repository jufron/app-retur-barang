<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use App\Models\Kategory;
use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\KategoryRequest;
use App\Services\Contract\CategoryServiceInterface;

class KategoryController extends Controller
{
    /**
    * @var CategoryServiceInterface
    */
    protected CategoryServiceInterface $kategoryService;

    /**
     * @var CategoryServiceInterface
     */
    public function __construct(CategoryServiceInterface $kategoryService)
    {
        $this->kategoryService = $kategoryService;
    }

    /**
     * Display a listing of the resource.
     * @return View
     */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.index', [
            'kategory'    => $this->kategoryService->getKategoryBarang()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     * @return View
     */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param KategoryRequest $request
     * @return RedirectResponse
     */
    public function store(KategoryRequest $request) : RedirectResponse
    {
        $this->kategoryService->createKategoryBarang($request);
        return redirect()->route('wr.kategory-barang.index');
    }

    /**
     * Display the specified resource.
     * @param Kategory $kategory
     * @return JsonResponse
     */
    public function show(Kategory $kategory) : JsonResponse
    {
        return $this->kategoryService->showKategoryBarang($kategory);
    }

    /**
     * Show the form for editing the specified resource.
     * @param Kategory $kategory
     * @return View
     */
    public function edit(Kategory $kategory) : View
    {
        return view('dashboard.warehouse-retur.categoryBarang.edit', compact('kategory'));
    }

    /**
     * Update the specified resource in storage.
     * @param KategoryRequest $request
     * @param Kategory $kategory
     * @return RedirectResponse
     */
    public function update(KategoryRequest $request, Kategory $kategory) : RedirectResponse
    {
        $this->kategoryService->updateKategoryBarang($request, $kategory);
        return redirect()->route('wr.kategory-barang.index');
    }

    /**
     * Remove the specified resource from storage.
     * @param Kategory $kategory
     * @return RedirectResponse
     */
    public function destroy(Kategory $kategory) : RedirectResponse
    {
        $kategory->delete();
        notify()->success("Berhasil Menghapus Kategory Barang");
        return redirect()->route('wr.kategory-barang.index');
    }
}
