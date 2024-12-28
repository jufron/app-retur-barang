<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Dashboard\Logistik\{
    DataLogistikController
};

// ? dashboard/logistik
Route::prefix('logistik')->group( function () {

    Route::resource('data-logistik', DataLogistikController::class)
        ->parameters(['data-logistik', 'dataLogistik'])
        ->names([
            'index'         => 'logistik.data-logistik.index',
            'create'        => 'logistik.data-logistik.create',
            'store'         => 'logistik.data-logistik.store',
            'show'          => 'logistik.data-logistik.show',
            'edit'          => 'logistik.data-logistik.edit',
            'update'        => 'logistik.data-logistik.update',
            'destroy'       => 'logistik.data-logistik.destroy'
        ]);
});
