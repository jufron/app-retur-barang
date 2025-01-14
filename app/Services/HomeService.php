<?php

namespace App\Services;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategory;
use App\Models\BarangRusak;
use App\Models\DataLogistik;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Contract\HomeServiceInterface;

class HomeService implements HomeServiceInterface
{
    public function getAdminReturCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'admin-retur');
        })->count();
    }

    public function getLogistikUserCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'logistik');
        })->count();
    }

    public function getWarehouseAsistentCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'warehouse-asistent');
        })->count();
    }

    public function getWarehouseReturCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'warehouse-retur');
        })->count();
    }

    public function getDataLogistikCount () : string
    {
        return DataLogistik::query()->count();
    }

    public function getBarangCount () : string
    {
        return Barang::query()->count();
    }

    public function getBarangRusakCount () : string
    {
        return BarangRusak::query()->count();
    }

    public function getKategoryBarangCount () : string
    {
        return Kategory::query()->count();
    }

    public function getBarangSortirCount () : string
    {
        return '1';
    }

    public function getNotaReturBarangCount () : string
    {
        return '2';
    }

}
