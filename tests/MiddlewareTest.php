<?php

namespace Enflow\OutdatedBrowser\Test;

use Enflow\OutdatedBrowser\OutdatedBrowserMiddleware;
use Illuminate\Testing\TestResponse;
use Illuminate\Support\Facades\Route;

class MiddlewareTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        TestResponse::macro('assertSeeGate', function () {
            $content = $this
                ->assertSuccessful()
                ->baseResponse->content();

            TestCase::assertStringContainsString('Outdated Browser', $content);
        });

        TestResponse::macro('assertDontSeeGate', function () {
            $this
                ->assertSuccessful()
                ->assertSee('ok');

            return $this;
        });

        Route::any('/', function () {
            return 'ok';
        })->middleware(OutdatedBrowserMiddleware::class);
    }

    public function test_that_gate_activated_on_old_browsers()
    {
        config()->set('outdated-browser.blocked_user_agent_regexes', ['/test/i']);

        $this
            ->withHeaders([
                'User-Agent' => 'Test',
            ])
            ->get('/')
            ->assertSeeGate();
    }

    public function test_that_gate_doesnt_activate_if_regex_doesnt_match()
    {
        $this
            ->withHeaders([
                'User-Agent' => 'Brand New Browser ✨',
            ])
            ->get('/')
            ->assertDontSeeGate();
    }
}
