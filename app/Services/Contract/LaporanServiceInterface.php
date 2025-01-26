<?php


namespace App\Services\Contract;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;

interface LaporanServiceInterface {

    public function getBulan () : array;
    
    public function laporanKategory () : Response;

    public function laporanLogistik (Request $request) : Response | RedirectResponse ;

    public function laporanBarang (Request $request) : Response | RedirectResponse;

    public function laporanBarangRusak (Request $request) : Response | RedirectResponse;

    public function barangSortir (Request $request) : Response | RedirectResponse;
}
