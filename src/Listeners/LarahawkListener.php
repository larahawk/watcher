<?php

namespace Larahawk\Watcher\Listeners;

use Illuminate\Log\Events\MessageLogged;
use Larahawk\Watcher\Actions\SendLog;

class LarahawkListener
{

    public function __construct()
    {

    }

    public function handle(MessageLogged $message)
    {
        $sendLog = new SendLog($message, app()->request);
        $sendLog->dispatch();
    }

}