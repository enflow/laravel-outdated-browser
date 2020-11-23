<?php

namespace Enflow\OutdatedBrowser\Detector;

use Illuminate\Http\Request;

interface Detector
{
    public function isOutdated(Request $request): bool;
}
