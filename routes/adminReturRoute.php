<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\AdminRetur\{
    AdminReturController,
    WarehouseReturController,
    WarehouseAsistentController,
};

// ? prefix dashboard
Route::resource('admin-retur', AdminReturController::class)
    ->parameters(['admin-retur'   => 'user']);

Route::resource('warehouse-asistent', WarehouseAsistentController::class)
    ->parameters(['warehouse-asistent'   => 'user']);

Route::resource('warehouse-retur', WarehouseReturController::class)
    ->parameters(['warehouse-retur'   => 'user']);

