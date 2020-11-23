<?php

namespace Enflow\OutdatedBrowser\Memory;

interface Memory
{
    public function hasContinued(): bool;

    public function remember(): void;
}
