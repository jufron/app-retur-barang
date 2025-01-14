<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\WarehouseRetur\{
    BarangController,
    WarehouseReturController,
    BarangRusakController,
    KategoryController,
};

// ? prefix dashboard/wr    => warehouse retur
Route::prefix('wr')->group(function () {

    // ? warehouse retur
    Route::resource('warehouse-retur', WarehouseReturController::class)
        ->parameters(['warehouse-retur'   => 'warehouseRetur'])
        ->names([
            'index'     => 'wr.warehouse-retur.index',
            'create'    => 'wr.warehouse-retur.create',
            'store'     => 'wr.warehouse-retur.store',
            'show'      => 'wr.warehouse-retur.show',
            'edit'      => 'wr.warehouse-retur.edit',
            'update'    => 'wr.warehouse-retur.update',
            'destroy'   => 'wr.warehouse-retur.destroy'
        ]);

    // ? barang
    Route::resource('barang', BarangController::class)
        ->names([
            'index'     => 'wr.barang.index',
            'create'    => 'wr.barang.create',
            'store'     => 'wr.barang.store',
            'show'      => 'wr.barang.show',
            'edit'      => 'wr.barang.edit',
            'update'    => 'wr.barang.update',
            'destroy'   => 'wr.barang.destroy'
        ]);

    // ? kategory barang
    Route::resource('kategory', KategoryController::class)
        ->names([
            'index'     => 'wr.kategory-barang.index',
            'create'    => 'wr.kategory-barang.create',
            'store'     => 'wr.kategory-barang.store',
            'show'      => 'wr.kategory-barang.show',
            'edit'      => 'wr.kategory-barang.edit',
            'update'    => 'wr.kategory-barang.update',
            'destroy'   => 'wr.kategory-barang.destroy'
        ]);

    // ? barang rusak

    Route::get('barang-rusak/search', [BarangRusakController::class, 'search'])
        ->name('wr.barang-rusak.search');

    Route::resource('barang-rusak', BarangRusakController::class)
        ->parameters(['barang-rusak'   => 'barangRusak'])
        ->names([
            'index'     => 'wr.barang-rusak.index',
            'create'    => 'wr.barang-rusak.create',
            'store'     => 'wr.barang-rusak.store',
            'show'      => 'wr.barang-rusak.show',
            'edit'      => 'wr.barang-rusak.edit',
            'update'    => 'wr.barang-rusak.update',
            'destroy'   => 'wr.barang-rusak.destroy'
        ]);

});
