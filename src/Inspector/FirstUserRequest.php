<?php

namespace Enflow\OutdatedBrowser\Inspector;

use Illuminate\Http\Request;

class FirstUserRequest implements Inspector
{
    public function shouldPresentGate(Request $request): bool
    {
        return $request->method() === 'GET' && ! $request->ajax();
    }
}
