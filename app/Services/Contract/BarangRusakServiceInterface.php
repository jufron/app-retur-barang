<?php

namespace App\Services\Contract;

use App\Models\BarangRusak;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Collection;

interface BarangRusakServiceInterface
{
    public function getBarangRusak () : Collection;

    public function createBarangRusak () : Collection;

    public function storeBarangRusak (Request $request) : void;

    public function showBarangRusak (BarangRusak $barangRusak) : JsonResponse;

    public function editBarangRusak (BarangRusak $barangRusak) : Collection;

    public function updateBarangRusak (Request $request, BarangRusak $barangRusak) : void;
}
