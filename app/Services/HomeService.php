<?php

namespace App\Services;

use App\Models\User;
use App\Models\Barang;
use App\Models\Kategory;
use App\Models\BarangRusak;
use App\Models\BarangSortir;
use App\Models\DataLogistik;
use Illuminate\Database\Eloquent\Builder;
use App\Services\Contract\HomeServiceInterface;

class HomeService implements HomeServiceInterface
{
    /**
     * Get count of admin retur users
     * @return string
     */
    public function getAdminReturCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'admin-retur');
        })->count();
    }

    /**
     * Get count of logistik users
     * @return string
     */
    public function getLogistikUserCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'logistik');
        })->count();
    }

    /**
     * Get count of warehouse assistant users
     * @return string
     */
    public function getWarehouseAsistentCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'warehouse-asisten');
        })->count();
    }

    /**
     * Get count of warehouse retur users
     * @return string
     */
    public function getWarehouseReturCount () : string
    {
        return User::with('roles:id,name')->whereHas('roles', function (Builder $query) {
            $query->where('name', 'warehouse-retur');
        })->count();
    }

    /**
     * Get total count of logistics data
     * @return string
     */
    public function getDataLogistikCount () : string
    {
        return DataLogistik::query()->count();
    }

    /**
     * Get total count of items
     * @return string
     */
    public function getBarangCount () : string
    {
        return Barang::query()->count();
    }

    /**
     * Get total count of damaged items
     * @return string
     */
    public function getBarangRusakCount () : string
    {
        return BarangRusak::query()->count();
    }

    /**
     * Get total count of item categories
     * @return string
     */
    public function getKategoryBarangCount () : string
    {
        return Kategory::query()->count();
    }

    /**
     * Get total count of sorted items
     * @return string
     */
    public function getBarangSortirCount () : string
    {
        return BarangSortir::query()->count();
    }
}
