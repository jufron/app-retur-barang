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
    /**
     * @var BarangRusakServiceInterface
     */
    protected BarangRusakServiceInterface $barangRusakService;

    /**
     * Constructor for BarangRusakController
     *
     * @param BarangRusakServiceInterface $barangRusakService The service interface for handling damaged goods
    */
    public function __construct(BarangRusakServiceInterface $barangRusakService)
    {
        $this->barangRusakService = $barangRusakService;
    }

    /**
     * Display a listing of the resource.
     *
     * @return View Returns view with list of damaged goods
     */
    public function index() : View
    {
        return view('dashboard.warehouse-retur.barang-rusak-manajement.index', [
            'barangRusak' => $this->barangRusakService->getBarangRusak()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return View Returns view with form to create new damaged goods entry
     */
    public function create() : View
    {
        return view('dashboard.warehouse-retur.barang-rusak-manajement.create', [
            'barang'        => $this->barangRusakService->getBarang(),
            'reassonRetur'  => $this->barangRusakService->getReassonRetur()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param BarangRusakRequest $request The validated request data
     * @return RedirectResponse Redirects to index page after storing
     */
    public function store(BarangRusakRequest $request) : RedirectResponse
    {
        $this->barangRusakService->storeBarangRusak($request);
        return redirect()->route('wr.barang-rusak.index');
    }

    /**
     * Display the specified resource.
     *
     * @param BarangRusak $barangRusak The damaged goods model instance
     * @return JsonResponse Returns JSON response with damaged goods details
     */
    public function show(BarangRusak $barangRusak) : JsonResponse
    {
        return $this->barangRusakService->showBarangRusak($barangRusak);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param BarangRusak $barangRusak The damaged goods model instance
     * @return View Returns view with form to edit damaged goods
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
     *
     * @param Request $request The request data
     * @param BarangRusak $barangRusak The damaged goods model instance
     * @return RedirectResponse Redirects to index page after updating
     */
    public function update(Request $request, BarangRusak $barangRusak) : RedirectResponse
    {
        $this->barangRusakService->updateBarangRusak($request, $barangRusak);
        return redirect()->route('wr.barang-rusak.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param BarangRusak $barangRusak The damaged goods model instance
     * @return RedirectResponse Redirects to index page after deletion
     */
    public function destroy(BarangRusak $barangRusak) : RedirectResponse
    {
        $barangRusak->delete();
        notify()->success("Berhasil Menghapus Barang Rusak");
        return redirect()->route('wr.barang-rusak.index');
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
