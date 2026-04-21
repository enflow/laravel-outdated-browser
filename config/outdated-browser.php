<?php

use Enflow\OutdatedBrowser\Detector\UserAgentDetector;
use Enflow\OutdatedBrowser\Inspector\FirstUserRequest;
use Enflow\OutdatedBrowser\Memory\CookieMemory;

return [
    'detector_class' => UserAgentDetector::class,
    'memory_class' => CookieMemory::class,
    'inspector_class' => FirstUserRequest::class,

    'blocked_user_agent_regexes' => [
        '~MSIE|Internet Explorer~i',
        '~Trident/7.0(.*)?; rv:11.0~',
    ],
];
