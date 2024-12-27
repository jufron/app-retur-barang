<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Connection;
use Illuminate\Database\Events\QueryExecuted;

class DatabaseServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
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

    }
}
