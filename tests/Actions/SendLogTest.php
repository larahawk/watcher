<?php

namespace Larahawk\Watcher\Tests\Actions;

use Larahawk\Watcher\Tests\TestCase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Log;
use Illuminate\Log\Events\MessageLogged;
use Larahawk\Watcher\Actions\SendLog;

class SendLogTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $logLevelsWatched = [
            'emergency',
            'alert',
            'critical',
            'error',
            'warning'
        ];

        config()->set('larahawk.logLevelsWatched', $logLevelsWatched);
    }

    /** @test */
    public function it_will_return_a_payload_from_a_log_level_being_watched()
    {
        Event::fake();

        $expected = [
            'level' => 'alert',
            'message' => 'This is an alert test!',
            'route' => '/',
            'fullUrl' => 'http://localhost',
            'ip' => '127.0.0.1',
            'method' => 'GET',
            'userId' => 0,
            'file' => null,
            'line' => null,
            'trace' => null
        ];

        $sendLog = new SendLog(new MessageLogged('alert',  'This is an alert test!'), app()->request);
        $actual = $sendLog->dispatch();

        unset($actual['userAgent']);

        $this->assertEquals($expected, $actual);
    }

    /** @test */
    public function it_will_return_false_with_a_log_level_not_being_watched()
    {
        Event::fake();

        $expected = false;

        $sendLog = new SendLog(new MessageLogged('debug',  'This is a debug test!'), app()->request);
        $actual = $sendLog->dispatch();

        $this->assertEquals($expected, $actual);
    }

}