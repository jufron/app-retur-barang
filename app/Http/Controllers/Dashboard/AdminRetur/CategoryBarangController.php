<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

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

    public function index () : View
    {
        return view('dashboard.admin.kategory-barang-manajement.index', [
            'kategoryBarang'    => $this->categoryBarangService->getKategoryBarang()
        ]);
    }

    // public function create () : View
    // {
    //     return view('dashboard.admin.kategory-barang-manajement.create');
    // }

    public function show (KategoryBarang $kategoryBarang) : JsonResponse
    {
        return $this->categoryBarangService->showKategoryBarang($kategoryBarang);
    }

    public function edit (KategoryBarang $kategoryBarang) : View
    {
        return view('dashboard.admin.kategory-barang-manajement.edit', compact('kategoryBarang'));
    }

    public function update (KategoryBarangRequest $request, KategoryBarang $kategoryBarang) : RedirectResponse
    {
        $this->categoryBarangService->updateKategoryBarang($request, $kategoryBarang);
        return redirect()->route('admin.category-barang.index');
    }

    public function destroy (KategoryBarang $kategoryBarang) : RedirectResponse
    {
        $kategoryBarang->delete();
        notify()->success("Berhasil Menghapus Kategory Barang");
        return redirect()->route('admin.category-barang.index');
    }
}
