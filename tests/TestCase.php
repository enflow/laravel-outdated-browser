<?php

namespace Enflow\OutdatedBrowser\Test;

use Enflow\OutdatedBrowser\OutdatedBrowserServiceProvider;
use Illuminate\Foundation\Testing\Concerns\InteractsWithContainer;
use Orchestra\Testbench\TestCase as TestbenchTestCase;

abstract class TestCase extends TestbenchTestCase
{
    use InteractsWithContainer;

    protected function getPackageProviders($app)
    {
        return [
            OutdatedBrowserServiceProvider::class,
        ];
    }
}
