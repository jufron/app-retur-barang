<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\WarehouseRetur\WarehouseAsistentController;
use App\Http\Controllers\Dashboard\WarehouseRetur\CategoryBarangController;

// ? prefix dashboard/wr    => warehouse retur
Route::prefix('wr')->group(function () {

    Route::resource('warehouse-asistent', WarehouseAsistentController::class)
        ->parameters(['warehouse-asistent'   => 'user'])
        ->names([
            'index'     => 'wr.warehouse-asistent.index',
            'create'    => 'wr.warehouse-asistent.create',
            'store'     => 'wr.warehouse-asistent.store',
            'show'      => 'wr.warehouse-asistent.show',
            'edit'      => 'wr.warehouse-asistent.edit',
            'update'    => 'wr.warehouse-asistent.update',
            'destroy'   => 'wr.warehouse-asistent.destroy'
        ]);

    Route::resource('kategory-barang', CategoryBarangController::class)
    ->parameters(['kategory-barang'   => 'kategoryBarang'])
    ->names([
        'index'     => 'wr.kategory-barang.index',
        'create'    => 'wr.kategory-barang.create',
        'store'     => 'wr.kategory-barang.store',
        'show'      => 'wr.kategory-barang.show',
        'edit'      => 'wr.kategory-barang.edit',
        'update'    => 'wr.kategory-barang.update',
        'destroy'   => 'wr.kategory-barang.destroy'
    ]);

    
});