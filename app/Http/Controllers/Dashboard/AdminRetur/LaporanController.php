<?php

namespace App\Http\Controllers\Dashboard\AdminRetur;

use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use App\Services\Contract\LaporanServiceInterface;

class LaporanController extends Controller
{
    /**
     * Create a new LaporanController instance.
     *
     * @param LaporanServiceInterface $laporanService
     */
    public function __construct(
        protected LaporanServiceInterface $laporanService)
    {
        
    }

    /**
     * Display the laporan page.
     *
     * @return \Illuminate\View\View
     */
    public function index () : View
    {
        return view('dashboard.admin.laporan.laporan', [
            'bulan' => $this->laporanService->getBulan()
        ]);
    }

    public function kategory () : Response  
    {
        return $this->laporanService->laporanKategory();
    }

    public function logistik (Request $request) : Response | RedirectResponse
    {
        return $this->laporanService->laporanLogistik($request);
    }

    public function barang (Request $request) : Response | RedirectResponse
    {
        return $this->laporanService->laporanBarang($request);
    }

    public function barangRusak (Request $request) : Response | RedirectResponse
    {
        return $this->laporanService->laporanBarangRusak($request);
    }

    public function barangSortir (Request $request) : Response | RedirectResponse
    {
        return $this->laporanService->barangSortir($request);
    }
}
