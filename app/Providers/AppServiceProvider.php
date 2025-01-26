<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Services\{
    BarangRusakService,
    DataLogistikService,
    UserManajementService,
    KategoryService,
    BarangService,
    HomeService,
    BarangSortirService,
    LaporanService,
};
use App\Services\Contract\{
    BarangRusakServiceInterface,
    BarangServiceInterface,
    DataLogistikServiceInterface,
    UserManajementServiceInterface,
    CategoryServiceInterface,
    HomeServiceInterface,
    BarangSortirServiceInterface,
    LaporanServiceInterface,
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        // ? initialize service class
        $this->app->singletonIf(HomeServiceInterface::class, HomeService::class);
        $this->app->singletonIf(UserManajementServiceInterface::class, UserManajementService::class);
        $this->app->singletonIf(CategoryServiceInterface::class, KategoryService::class);
        $this->app->singletonIf(DataLogistikServiceInterface::class, DataLogistikService::class);
        $this->app->singletonIf(BarangRusakServiceInterface::class, BarangRusakService::class);
        $this->app->singletonIf(BarangServiceInterface::class, BarangService::class);
        $this->app->singletonIf(BarangSortirServiceInterface::class, BarangSortirService::class);
        $this->app->singletonIf(LaporanServiceInterface::class, LaporanService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Password::defaults(function () {
            return Password::min(8)
                ->letters()
                ->mixedCase()
                ->numbers()
                ->symbols()
                ->uncompromised();
        });

        Blade::if('storageExcsist', function ($filePath = null, $disk = 'public') {
            return $filePath && Storage::disk($disk)->exists($filePath);
        });
    }
}
