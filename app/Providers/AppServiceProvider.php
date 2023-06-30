<?php

namespace App\Providers;

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;
use Pusher\Pusher;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('pusher', function (Application $app) {
            $config = $app->make('config')['broadcasting.connections.pusher'];
            return new Pusher(
                $config['key'],
                $config['secret'],
                $config['app_id'],
                [
                    'cluster' => $config['cluster'],
                    'useTls' => $config['options']['useTLS'],
                ],
            );
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $table = config('admin.extensions.config.table', 'admin_config');
        if (Schema::hasTable($table)) {
            Config::load();
        }
    }
}
