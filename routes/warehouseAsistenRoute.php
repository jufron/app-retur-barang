<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\WarehouseAsisten\BarangSortirController;

Route::prefix('wa')->group( function () {

    Route::get('barang-sortir/search', [BarangSortirController::class, 'search'])
        ->name('wa.barang-sortir.search');

    Route::resource('barang-sortir', BarangSortirController::class)
        ->parameters(['barang-sortir' => 'barangSortir'])
        ->names([
            'index' => 'wa.barang-sortir.index',
            'create' => 'wa.barang-sortir.create',
            'store' => 'wa.barang-sortir.store',
            'show' => 'wa.barang-sortir.show',
            'edit' => 'wa.barang-sortir.edit',
            'update' => 'wa.barang-sortir.update',
            'destroy' => 'wa.barang-sortir.destroy'
        ]);
});
