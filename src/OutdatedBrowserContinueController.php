<?php

namespace Enflow\OutdatedBrowser;

use Enflow\OutdatedBrowser\Memory\Memory;
use Illuminate\Http\Request;

class OutdatedBrowserContinueController
{
    public function __invoke(Request $request, Memory $memory)
    {
        $memory->remember();

        return back();
    }
}
