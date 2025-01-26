<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use Illuminate\View\View;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Http\Requests\KategoryRequest;
use App\Models\Kategory;
use App\Services\Contract\CategoryServiceInterface;

class KategoryController extends Controller
{
    /**
     * @var CategoryServiceInterface
    */
    protected CategoryServiceInterface $kategoryService;

    /**
     * KategoryController constructor.
     * @param CategoryServiceInterface $kategoryService
    */
    public function __construct(CategoryServiceInterface $kategoryService)
    {
        $this->kategoryService = $kategoryService;
    }

    /**
     * Display a listing of the kategory.
     *
     * @return View
     */
    public function index () : View
    {
        return view('dashboard.admin.kategory-barang-manajement.index', [
            'kategory'    => $this->kategoryService->getKategoryBarang()
        ]);
    }

    // public function create () : View
    // {
    //     return view('dashboard.admin.kategory-barang-manajement.create');
    // }

    /**
     * Show the specified kategory.
     *
     * @param Kategory $kategory
     * @return JsonResponse
    */
    public function show (Kategory $kategory) : JsonResponse
    {
        return $this->kategoryService->showKategoryBarang($kategory);
    }

    /**
     * Show the form for editing the specified kategory.
     *
     * @param Kategory $kategory
     * @return View
     */
    public function edit (Kategory $kategory) : View
    {
        return view('dashboard.admin.kategory-barang-manajement.edit', compact('kategory'));
    }

    /**
     * Update the specified kategory in storage.
     *
     * @param KategoryRequest $request
     * @param Kategory $kategory
     * @return RedirectResponse
     */
    public function update (KategoryRequest $request, Kategory $kategory) : RedirectResponse
    {
        $this->kategoryService->updateKategoryBarang($request, $kategory);
        return redirect()->route('admin.category-barang.index');
    }

    /**
     * Remove the specified kategory from storage.
     *
     * @param Kategory $kategory
     * @return RedirectResponse
     */
    public function destroy (Kategory $kategory) : RedirectResponse
    {
        $kategory->delete();
        notify()->success("Berhasil Menghapus Kategory Barang");
        return redirect()->route('admin.category-barang.index');
    }
}
