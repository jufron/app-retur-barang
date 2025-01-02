<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Services\{
    BarangRusakService,
    DataLogistikService,
    CategoryBarangService,
    UserManajementService,
};
use App\Services\Contract\{
    BarangRusakServiceInterface,
    DataLogistikServiceInterface,
    CategoryBarangServiceInterface,
    UserManajementServiceInterface,
};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(UserManajementServiceInterface::class, UserManajementService::class);
        $this->app->singletonIf(CategoryBarangServiceInterface::class, CategoryBarangService::class);
        $this->app->singletonIf(DataLogistikServiceInterface::class, DataLogistikService::class);
        $this->app->singletonIf(BarangRusakServiceInterface::class, BarangRusakService::class);
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
