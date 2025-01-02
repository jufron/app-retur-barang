<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminRetur\{
    AdminReturController,
    CategoryBarangController,
    LogistikController,
    WarehouseReturController,
    WarehouseAsistentController,
    DataLogistikController,
    BarangRusakController,
};

// ? prefix dashboard/admin
Route::prefix('admin')->group( function () {

    // ? admin-retur user manajement
    Route::resource('admin-retur', AdminReturController::class)
        ->parameters(['admin-retur'   => 'user'])
        ->names([
            'index'     => 'admin.admin-retur.index',
            'create'    => 'admin.admin-retur.create',
            'store'     => 'admin.admin-retur.store',
            'show'      => 'admin.admin-retur.show',
            'edit'      => 'admin.admin-retur.edit',
            'update'    => 'admin.admin-retur.update',
            'destroy'   => 'admin.admin-retur.destroy'
        ]);

    // ? warehouse asistent user manajement
    Route::resource('warehouse-asistent', WarehouseAsistentController::class)
        ->parameters(['warehouse-asistent'   => 'user'])
        ->names([
            'index'     => 'admin.warehouse-asistent.index',
            'create'    => 'admin.warehouse-asistent.create',
            'store'     => 'admin.warehouse-asistent.store',
            'show'      => 'admin.warehouse-asistent.show',
            'edit'      => 'admin.warehouse-asistent.edit',
            'update'    => 'admin.warehouse-asistent.update',
            'destroy'   => 'admin.warehouse-asistent.destroy'
        ]);

    // ? warehouse retur user manajement
    Route::resource('warehouse-retur', WarehouseReturController::class)
        ->parameters(['warehouse-retur'   => 'user'])
        ->names([
            'index'     => 'admin.warehouse-retur.index',
            'create'    => 'admin.warehouse-retur.create',
            'store'     => 'admin.warehouse-retur.store',
            'show'      => 'admin.warehouse-retur.show',
            'edit'      => 'admin.warehouse-retur.edit',
            'update'    => 'admin.warehouse-retur.update',
            'destroy'   => 'admin.warehouse-retur.destroy'
        ]);

    // ? logistik user manajement
    Route::resource('logistik-manajement', LogistikController::class)
        ->parameters(['logistik-manajement'   => 'user'])
        ->names([
            'index'     => 'admin.logistik-manajement.index',
            'create'    => 'admin.logistik-manajement.create',
            'store'     => 'admin.logistik-manajement.store',
            'show'      => 'admin.logistik-manajement.show',
            'edit'      => 'admin.logistik-manajement.edit',
            'update'    => 'admin.logistik-manajement.update',
            'destroy'   => 'admin.logistik-manajement.destroy'
        ]);

    // ? category barang
    Route::resource('category-barang', CategoryBarangController::class)
        ->parameters(['category-barang'   => 'kategoryBarang'])
        ->except(['create', 'store'])
        ->names([
            'index'     => 'admin.category-barang.index',
            'show'      => 'admin.category-barang.show',
            'edit'      => 'admin.category-barang.edit',
            'update'    => 'admin.category-barang.update',
            'destroy'   => 'admin.category-barang.destroy'
        ]);

    // ? data logistik
    Route::resource('data-logistik', DataLogistikController::class)
        ->parameters('data-logistik', 'dataLogistik')
        ->except(['create', 'store', 'edit', 'update', 'destroy'])
        ->names([
            'index'     => 'admin.data-logistik.index',
            'show'      => 'admin.data-logistik.show'
        ]);

    // ? barang rusak
    Route::resource('barang-rusak', BarangRusakController::class)
    ->parameters(['barang-rusak'   => 'barangRusak'])
    ->except(['create', 'store'])
    ->names([
        'index'     => 'admin.barang-rusak.index',
        'show'      => 'admin.barang-rusak.show',
        'edit'      => 'admin.barang-rusak.edit',
        'update'    => 'admin.barang-rusak.update',
        'destroy'   => 'admin.barang-rusak.destroy'
    ]);

});
