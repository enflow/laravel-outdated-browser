<?php

namespace Enflow\OutdatedBrowser\Memory;

class SessionMemory implements Memory
{
    private const KEY = 'outdated-browser::continued';

    public function hasContinued(): bool
    {
        return (bool) session()->get(static::KEY);
    }

    public function remember(): void
    {
        session()->put(static::KEY, true);
    }
}
