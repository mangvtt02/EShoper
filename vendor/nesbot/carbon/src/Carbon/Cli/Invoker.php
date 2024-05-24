<?php

<<<<<<< HEAD
/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
namespace Carbon\Cli;

class Invoker
{
<<<<<<< HEAD
    public const CLI_CLASS_NAME = 'Carbon\\Cli';
=======
    const CLI_CLASS_NAME = 'Carbon\\Cli';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    protected function runWithCli(string $className, array $parameters): bool
    {
        $cli = new $className();

        return $cli(...$parameters);
    }

    public function __invoke(...$parameters): bool
    {
        if (class_exists(self::CLI_CLASS_NAME)) {
            return $this->runWithCli(self::CLI_CLASS_NAME, $parameters);
        }

        $function = (($parameters[1] ?? '') === 'install' ? ($parameters[2] ?? null) : null) ?: 'shell_exec';
        $function('composer require carbon-cli/carbon-cli --no-interaction');

        echo 'Installation succeeded.';

        return true;
    }
}
