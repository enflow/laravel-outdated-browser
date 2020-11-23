<?php

namespace Enflow\OutdatedBrowser\Inspector;

use Illuminate\Http\Request;

class FirstRequest implements Inspector
{
    public function shouldPresentGate(Request $request): bool
    {
        // AJAX requests shouldn't have this gate added.
        return ! $request->ajax() && $request->method() === 'GET';
    }
}
