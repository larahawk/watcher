<?php

namespace Larahawk\Watcher\Tests;

use Larahawk\Watcher\Larahawk;
use Larahawk\Watcher\LarahawkServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class TestCase extends Orchestra
{

    protected function getPackageProviders($app)
    {
        return [
            LarahawkServiceProvider::class,
        ];
    }

}