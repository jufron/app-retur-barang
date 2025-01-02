<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use Illuminate\View\View;
use App\Models\BarangRusak;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRusakRequest;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\BarangRusakServiceInterface;

class BarangRusakController extends Controller
{
    protected $barangRusakService;

    public function __construct(BarangRusakServiceInterface $barangRusakService)
    {
        $this->barangRusakService = $barangRusakService;
    }

    public function index () : View
    {
        return view('dashboard.admin.barang-rusak-manajement.index', [
            'barangRusak' => $this->barangRusakService->getBarangRusak()
        ]);
    }

    public function show (BarangRusak $barangRusak) : JsonResponse
    {
        return $this->barangRusakService->showBarangRusak($barangRusak);
    }

    public function edit (BarangRusak $barangRusak)
    {
        return view('dashboard.admin.barang-rusak-manajement.edit', compact('barangRusak'));
    }

    public function update (BarangRusakRequest $request, BarangRusak $barangRusak) : RedirectResponse
    {
        $this->barangRusakService->updateBarangRusak($request, $barangRusak);
        return redirect()->route('admin.barang-rusak.index');
    }

    public function destroy (BarangRusak $barangRusak) : RedirectResponse
    {
        $barangRusak->delete();
        notify()->success("Berhasil Menghapus Barang Rusak");
        return redirect()->route('admin.barang-rusak.index');
    }
}
