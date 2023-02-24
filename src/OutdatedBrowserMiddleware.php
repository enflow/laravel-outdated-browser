<?php

namespace Enflow\OutdatedBrowser;

use Closure;
use Enflow\OutdatedBrowser\Detector\Detector;
use Enflow\OutdatedBrowser\Inspector\Inspector;
use Enflow\OutdatedBrowser\Memory\Memory;
use Illuminate\Http\Request;

class OutdatedBrowserMiddleware
{
    public function __construct(
        public readonly Detector $detector,
        public readonly Memory $memory,
        public readonly Inspector $inspector,
    ) {
    }

    public function handle(Request $request, Closure $next)
    {
        // The user has already choosen to continue with their outdated browser.
        if ($this->memory->hasContinued()) {
            return $next($request);
        }

        // The user choose to continue, let's pass that along to the controller.
        if ($request->routeIs('outdated-browser::continue')) {
            return $next($request);
        }

        // We cannot ask here.
        if ($this->inspector->shouldPresentGate($request) !== true) {
            return $next($request);
        }

        if ($this->detector->isOutdated($request)) {
            return response()->view('outdated-browser::gate');
        }

        return $next($request);
    }
}
