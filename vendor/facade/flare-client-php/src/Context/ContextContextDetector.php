<?php

namespace Facade\FlareClient\Context;

class ContextContextDetector implements ContextDetectorInterface
{
    public function detectCurrentContext(): ContextInterface
    {
        if ($this->runningInConsole()) {
            return new ConsoleContext($_SERVER['argv'] ?? []);
        }

        return new RequestContext();
    }

    private function runningInConsole(): bool
    {
        if (isset($_ENV['APP_RUNNING_IN_CONSOLE'])) {
            return $_ENV['APP_RUNNING_IN_CONSOLE'] === 'true';
        }

<<<<<<< HEAD
        if (isset($_ENV['FLARE_FAKE_WEB_REQUEST'])) {
            return false;
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return in_array(php_sapi_name(), ['cli', 'phpdb']);
    }
}
