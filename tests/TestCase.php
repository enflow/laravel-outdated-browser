<?php

namespace Enflow\OutdatedBrowser\Test;

use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

abstract class TestCase extends TestbenchTestCase
{
    use InteractsWithContainer;

    protected function getPackageProviders($app)
    {
        return [
            \Enflow\OutdatedBrowser\OutdatedBrowserServiceProvider::class,
        ];
    }
}
