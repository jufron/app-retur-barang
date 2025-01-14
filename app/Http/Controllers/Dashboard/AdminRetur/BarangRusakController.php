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
    /**
     * @var BarangRusakServiceInterface
     */
    protected BarangRusakServiceInterface $barangRusakService;

    /**
     * Constructor for BarangRusakController
     *
     * @param BarangRusakServiceInterface $barangRusakService
     */
    public function __construct(BarangRusakServiceInterface $barangRusakService)
    {
        $this->barangRusakService = $barangRusakService;
    }

    /**
     * Display a listing of barang rusak
     *
     * @return View
     */
    public function index () : View
    {
        return view('dashboard.admin.barang-rusak-manajement.index', [
            'barangRusak' => $this->barangRusakService->getBarangRusak()
        ]);
    }

    /**
     * Display the specified barang rusak
     *
     * @param BarangRusak $barangRusak
     * @return JsonResponse
     */
    public function show (BarangRusak $barangRusak) : JsonResponse
    {
        return $this->barangRusakService->showBarangRusak($barangRusak);
    }

    /**
     * Show the form for editing the specified barang rusak
     *
     * @param BarangRusak $barangRusak
     * @return View
     */
    public function edit (BarangRusak $barangRusak)
    {
        return view('dashboard.admin.barang-rusak-manajement.edit', [
            'barangRusak' => $barangRusak,
            'reassonRetur'  => $this->barangRusakService->editBarangRusak($barangRusak)
        ]);
    }

    /**
     * Update the specified barang rusak
     *
     * @param BarangRusakRequest $request
     * @param BarangRusak $barangRusak
     * @return RedirectResponse
     */
    public function update (BarangRusakRequest $request, BarangRusak $barangRusak) : RedirectResponse
    {
        $this->barangRusakService->updateBarangRusak($request, $barangRusak);
        return redirect()->route('admin.barang-rusak.index');
    }

    /**
     * Remove the specified barang rusak
     *
     * @param BarangRusak $barangRusak
     * @return RedirectResponse
     */
    public function destroy (BarangRusak $barangRusak) : RedirectResponse
    {
        $barangRusak->delete();
        notify()->success("Berhasil Menghapus Barang Rusak");
        return redirect()->route('admin.barang-rusak.index');
    }

    /**
     * Search for damaged goods.
     *
     * @param Request $request The request containing search parameters
     * @return JsonResponse Returns JSON response with search results
     */
    public function search (Request $request) : JsonResponse
    {
        return $this->barangRusakService->searchBarangRusak($request);
    }
}
