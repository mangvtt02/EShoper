<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler\FingersCrossed;

use Monolog\Logger;
<<<<<<< HEAD
use Psr\Log\LogLevel;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Error level based activation strategy.
 *
 * @author Johannes M. Schmitt <schmittjoh@gmail.com>
<<<<<<< HEAD
 *
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type LevelName from \Monolog\Logger
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class ErrorLevelActivationStrategy implements ActivationStrategyInterface
{
    /**
<<<<<<< HEAD
     * @var Level
=======
     * @var int
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $actionLevel;

    /**
     * @param int|string $actionLevel Level or name or value
<<<<<<< HEAD
     *
     * @phpstan-param Level|LevelName|LogLevel::* $actionLevel
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct($actionLevel)
    {
        $this->actionLevel = Logger::toMonologLevel($actionLevel);
    }

    public function isHandlerActivated(array $record): bool
    {
        return $record['level'] >= $this->actionLevel;
    }
}
