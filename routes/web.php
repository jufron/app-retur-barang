<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;


Route::get('/', function () {
    return view('frond.home');
});

Auth::routes();

ROute::controller(HomeController::class)->group(function () {
    Route::get('dashboard', 'index')->name('dashboard');

    Route::get('dashboard/admin-retur', 'adminRetur')->name('dashboard.admin-retur.fetch-data');
    Route::get('dashboard/logistik', 'logistik')->name('dashboard.logistik.fetch-data');
    Route::get('dashboard/warehouse-retur', 'warehouseRetur')->name('dashboard.warehouse-retur.fetch-data');
    Route::get('dashboard/warehouse-asisten', 'warehouseAsisten')->name('dashboard.warehouse-asisten.fetch-data');
});

// Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');
