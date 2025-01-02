<?php

namespace App\Http\Controllers\Dashboard\WarehouseRetur;

use App\Models\BarangRusak;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\BarangRusakRequest;
use App\Services\Contract\BarangRusakServiceInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class BarangRusakController extends Controller
{
    protected $barangRusakService;

    public function __construct(BarangRusakServiceInterface $barangRusakService)
    {
        $this->barangRusakService = $barangRusakService;
    }

    /**
     * Display a listing of the resource.
     */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.barang-rusak-manajement.index', [
            'barangRusak' => $this->barangRusakService->getBarangRusak()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.barang-rusak-manajement.create', [
            'reassonRetur'  => $this->barangRusakService->createBarangRusak()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BarangRusakRequest $request) : RedirectResponse
    {
        $this->barangRusakService->storeBarangRusak($request);
        return redirect()->route('wr.barang-rusak.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(BarangRusak $barangRusak) : JsonResponse
    {
        return $this->barangRusakService->showBarangRusak($barangRusak);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BarangRusak $barangRusak) : View
    {
        return view('dashboard.warehouse-retur.barang-rusak-manajement.edit', [
            'barangRusak'   => $barangRusak,
            'reassonRetur'  => $this->barangRusakService->editBarangRusak($barangRusak)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, BarangRusak $barangRusak) : RedirectResponse
    {
        $this->barangRusakService->updateBarangRusak($request, $barangRusak);
        return redirect()->route('wr.barang-rusak.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BarangRusak $barangRusak) : RedirectResponse
    {
        $barangRusak->delete();
        notify()->success("Berhasil Menghapus Barang Rusak");
        return redirect()->route('wr.barang-rusak.index');
    }
}
