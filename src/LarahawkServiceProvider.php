<?php

namespace Larahawk\Watcher;

use Illuminate\Support\Facades\App;
use Illuminate\Support\ServiceProvider;
use Illuminate\Http\Request;
use Larahawk\Watcher\LarahawkEventServiceProvider;

class LarahawkServiceProvider extends ServiceProvider
{

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config/larahawk.php' => config_path('larahawk.php'),
        ]);
    }

    public function register()
    {
        $this->app->register(LarahawkEventServiceProvider::class);
    }

    public function provides()
    {

    }

}
