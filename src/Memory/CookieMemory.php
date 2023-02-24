<?php

namespace Enflow\OutdatedBrowser\Memory;

use Illuminate\Support\Facades\Cookie;

class CookieMemory implements Memory
{
    private const KEY = 'outdated-browser::continued';

    public function hasContinued(): bool
    {
        return (bool) Cookie::get(static::KEY);
    }

    public function remember(): void
    {
        Cookie::queue(static::KEY, true, now()->addCentury()->diffInMinutes());
    }
}
