<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Support\Facades\Route;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
        then: function () {
            Route::prefix('dashboard')-> middleware('web', 'auth')->group( function () {

                Route::middleware('role:admin-retur')->group([
                    __DIR__ . '/../routes/adminReturRoute.php',
                ]);

                Route::middleware('role:logistik') ->group([
                    __DIR__ . '/../routes/logistikRoute.php',
                ]);

                Route::middleware('role:warehouse-asisten')->group([
                    __DIR__ . '/../routes/warehouseAsistenRoute.php',
                ]);

                Route::middleware('role:warehouse-retur')->group([
                    __DIR__ . '/../routes/warehouseReturRoute.php',
                ]);
            });
        }
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias([
            'role'                  => \Spatie\Permission\Middleware\RoleMiddleware::class,
            'permission'            => \Spatie\Permission\Middleware\PermissionMiddleware::class,
            'role_or_permission'    => \Spatie\Permission\Middleware\RoleOrPermissionMiddleware::class,
            'DNS1D'                 => Milon\Barcode\Facades\DNS1DFacade::class,
            'DNS2D'                 => Milon\Barcode\Facades\DNS2DFacade::class,
        ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
