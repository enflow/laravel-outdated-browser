<?php

namespace Enflow\OutdatedBrowser;

use Enflow\OutdatedBrowser\Detector\Detector;
use Enflow\OutdatedBrowser\Inspector\Inspector;
use Enflow\OutdatedBrowser\Memory\Memory;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class OutdatedBrowserServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->registerConfig();
        $this->registerViews();
        $this->registerTranslations();
        $this->registerPublishables();
        $this->registerClasses();
        $this->registerRoutes();
    }

    private function registerConfig(): void
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/outdated-browser.php', 'outdated-browser');
    }

    private function registerViews(): void
    {
        $this->loadViewsFrom(__DIR__ . '/../resources/views', 'outdated-browser');
    }

    private function registerTranslations(): void
    {
        $this->loadTranslationsFrom(__DIR__ . '/../lang', 'outdated-browser');
    }

    private function registerPublishables(): self
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/outdated-browser.php' => config_path('outdated-browser.php'),
            ], 'config');

            $this->publishes([
                __DIR__ . '/../resources/views' => base_path('resources/views/vendor/outdated-browser'),
            ], 'views');

            $this->publishes([
                __DIR__ . '/../../lang' => lang_path('vendor/outdated-browser'),
            ], 'translations');
        }

        return $this;
    }

    private function registerClasses(): void
    {
        $this->app->singleton(Detector::class, function () {
            $class = config('outdated-browser.detector_class');

            return new $class;
        });

        $this->app->singleton(Memory::class, function () {
            $class = config('outdated-browser.memory_class');

            return new $class;
        });

        $this->app->singleton(Inspector::class, function () {
            $class = config('outdated-browser.inspector_class');

            return new $class;
        });
    }

    private function registerRoutes(): void
    {
        Route::post('/_outdated-browser/continue', OutdatedBrowserContinueController::class)
            ->middleware(config('outdated-browser.middleware', ['web']))
            ->name('outdated-browser::continue');
    }
}
