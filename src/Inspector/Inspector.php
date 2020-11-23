<?php

namespace Enflow\OutdatedBrowser\Inspector;

use Illuminate\Http\Request;

interface Inspector
{
    public function shouldPresentGate(Request $request): bool;
}
