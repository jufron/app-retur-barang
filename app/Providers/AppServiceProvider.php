<?php

namespace App\Providers;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Validation\Rules\Password;
use Illuminate\Database\Events\QueryExecuted;
use App\Services\UserManajementService;
use App\Services\Contract\UserManajementServiceInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singletonIf(UserManajementServiceInterface::class, UserManajementService::class);
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

        DB::listen(function (QueryExecuted $query) {
            logger()->info('SQL Query', [
                'sql'       => $query->sql,
                'bindings'  => $query->bindings,
                'time'      => $query->time,
                'raw'       => $query->toRawSql()
            ]);
        });

        DB::whenQueryingForLongerThan(500, function (Connection $connection, QueryExecuted $event) {
            logger()->warning('Query exceeded 500ms: ' . $event->sql, [
                'bindings'      => $event->bindings,
                'time'          => $event->time,
                'connection'    => $event->connectionName,
            ]);
        });

        DB::whenQueryingForLongerThan(1000, function (Connection $connection, QueryExecuted $event) {
            logger()->error('Query exceeded 1000ms: ' . $event->sql, [
                'bindings'      => $event->bindings,
                'time'          => $event->time,
                'connection'    => $event->connectionName,
            ]);
        });

        Blade::if('storageExcsist', function ($filePath = null, $disk = 'public') {
            return $filePath && Storage::disk($disk)->exists($filePath);
        });
    }
}
