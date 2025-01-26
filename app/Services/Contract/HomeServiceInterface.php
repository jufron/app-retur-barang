<?php

namespace App\Services\Contract;

use Illuminate\Support\Collection;

interface HomeServiceInterface
{
    /**
     * Get count of admin retur users
     * @return string
     */
    public function getAdminReturCount () : string;

    /**
     * Get count of logistik users
     * @return string
     */
    public function getLogistikUserCount () : string;

    /**
     * Get count of warehouse assistant users
     * @return string
     */
    public function getWarehouseAsistentCount () : string;

    /**
     * Get count of warehouse retur
     * @return string
     */
    public function getWarehouseReturCount () : string;

    /**
     * Get count of logistik data
     * @return string
     */
    public function getDataLogistikCount () : string;

    /**
     * Get count of items
     * @return string
     */
    public function getBarangCount () : string;

    /**
     * Get count of damaged items
     * @return string
     */
    public function getBarangRusakCount () : string;

    /**
     * Get count of sorted items
     * @return string
     */
    public function getBarangSortirCount () : string;

    /**
     * Get count of item categories
     * @return string
     */
    public function getKategoryBarangCount () : string;
}
