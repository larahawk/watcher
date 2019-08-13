<?php

namespace Larahawk\Watcher\Tests\Config;

use Larahawk\Watcher\Tests\TestCase;

class GeneralConfigurationTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();
    }

    /** @test */
    public function it_will_return_the_array_of_log_levels_to_watch()
    {
        $expected = [
            'emergency',
            'alert',
            'critical',
            'error',
            'warning'
        ];

        config()->set('larahawk.logLevelsWatched', $expected);

        $actual = config('larahawk.logLevelsWatched');

        $this->assertEquals($expected, $actual);
    }

}