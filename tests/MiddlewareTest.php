<?php

namespace Enflow\OutdatedBrowser\Test;

use Enflow\OutdatedBrowser\OutdatedBrowserMiddleware;
use Illuminate\Support\Facades\Route;

class MiddlewareTest extends TestCase
{
    public function setUp(): void
    {
        parent::setUp();

        Route::any('/', function () {
            return 'ok';
        })->middleware(OutdatedBrowserMiddleware::class);
    }

    public function test_that_gate_activated_on_old_browsers()
    {
        config()->set('outdated-browser.blocked_user_agent_regexes', ['/test/i']);

        $content = $this
            ->withHeaders([
                'User-Agent' => 'Test',
            ])
            ->get('/')
            ->assertSuccessful()
            ->baseResponse->content();

        $this->assertStringContainsString('Browser is outdated', $content);
    }

    public function test_that_gate_doesnt_activate_if_regex_doesnt_match()
    {
        $content = $this
            ->withHeaders([
                'User-Agent' => 'Brand New Browser ✨',
            ])
            ->get('/')
            ->assertSuccessful()
            ->baseResponse->content();

        $this->assertEquals('ok', $content);
    }
}
