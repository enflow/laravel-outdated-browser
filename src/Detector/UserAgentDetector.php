<?php

namespace Enflow\OutdatedBrowser\Detector;

use Illuminate\Http\Request;

class UserAgentDetector implements Detector
{
    private array $regexes;

    public function __construct()
    {
        $this->regexes = config('outdated-browser.blocked_user_agent_regexes', []);
    }

    public function setRegexes(array $regexes)
    {
        $this->regexes = $regexes;
    }

    public function isOutdated(Request $request): bool
    {
        return true;
        foreach ($this->regexes as $regex) {
            if (preg_match($regex, $request->userAgent())) {
                return true;
            }
        }

        return false;
    }
}
