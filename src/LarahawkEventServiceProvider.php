<?php

namespace Larahawk\Watcher;

use Illuminate\Support\Facades\App;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;
use Illuminate\Support\Facades\Event;
use Illuminate\Log\Events\MessageLogged;
use Illuminate\Http\Request;
use Larahawk\Watcher\Listeners\LarahawkListener;

class LarahawkEventServiceProvider extends EventServiceProvider
{

    protected $listen = [
        MessageLogged::class => [
            LarahawkListener::class
        ]
    ];

    public function boot()
    {
        parent::boot();
    }

}
