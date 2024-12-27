<?php

namespace App\Providers;

use Illuminate\Support\Facades\Blade;
use App\Services\CategoryBarangService;
use App\Services\UserManajementService;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use App\Services\Contract\CategoryBarangServiceInterface;
use App\Services\Contract\UserManajementServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(UserManajementServiceInterface::class, UserManajementService::class);
        $this->app->singletonIf(CategoryBarangServiceInterface::class, CategoryBarangService::class);
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
