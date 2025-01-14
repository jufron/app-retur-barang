<?php

namespace App\Services\Contract;

use Illuminate\Support\Collection;

interface HomeServiceInterface
{
    public function getAdminReturCount () : string;

    public function getLogistikUserCount () : string;

    public function getWarehouseAsistentCount () : string;

    public function getWarehouseReturCount () : string;

    public function getDataLogistikCount () : string;

    public function getBarangCount () : string;

    public function getBarangRusakCount () : string;

    public function getBarangSortirCount () : string;

    public function getKategoryBarangCount () : string;

    public function getNotaReturBarangCount () : string;
}
