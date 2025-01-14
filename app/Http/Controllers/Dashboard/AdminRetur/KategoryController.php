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
    protected $kategoryService;

    public function __construct(CategoryServiceInterface $kategoryService)
    {
        $this->kategoryService = $kategoryService;
    }

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

    public function show (Kategory $kategory) : JsonResponse
    {
        return $this->kategoryService->showKategoryBarang($kategory);
    }

    public function edit (Kategory $kategory) : View
    {
        return view('dashboard.admin.kategory-barang-manajement.edit', compact('kategory'));
    }

    public function update (KategoryRequest $request, Kategory $kategory) : RedirectResponse
    {
        $this->kategoryService->updateKategoryBarang($request, $kategory);
        return redirect()->route('admin.category-barang.index');
    }

    public function destroy (Kategory $kategory) : RedirectResponse
    {
        $kategory->delete();
        notify()->success("Berhasil Menghapus Kategory Barang");
        return redirect()->route('admin.category-barang.index');
    }
}
