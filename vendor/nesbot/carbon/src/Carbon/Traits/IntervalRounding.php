<?php

/**
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
namespace Carbon\Traits;

use Carbon\CarbonInterval;
use Carbon\Exceptions\InvalidIntervalException;
use DateInterval;

/**
 * Trait to call rounding methods to interval or the interval of a period.
 */
trait IntervalRounding
{
    protected function callRoundMethod(string $method, array $parameters)
    {
        $action = substr($method, 0, 4);

        if ($action !== 'ceil') {
            $action = substr($method, 0, 5);
        }

<<<<<<< HEAD
        if (\in_array($action, ['round', 'floor', 'ceil'])) {
            return $this->{$action.'Unit'}(substr($method, \strlen($action)), ...$parameters);
=======
        if (in_array($action, ['round', 'floor', 'ceil'])) {
            return $this->{$action.'Unit'}(substr($method, strlen($action)), ...$parameters);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return null;
    }

    protected function roundWith($precision, $function)
    {
        $unit = 'second';

        if ($precision instanceof DateInterval) {
<<<<<<< HEAD
            $precision = (string) CarbonInterval::instance($precision, [], true);
        }

        if (\is_string($precision) && preg_match('/^\s*(?<precision>\d+)?\s*(?<unit>\w+)(?<other>\W.*)?$/', $precision, $match)) {
=======
            $precision = (string) CarbonInterval::instance($precision);
        }

        if (is_string($precision) && preg_match('/^\s*(?<precision>\d+)?\s*(?<unit>\w+)(?<other>\W.*)?$/', $precision, $match)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            if (trim($match['other'] ?? '') !== '') {
                throw new InvalidIntervalException('Rounding is only possible with single unit intervals.');
            }

            $precision = (int) ($match['precision'] ?: 1);
            $unit = $match['unit'];
        }

        return $this->roundUnit($unit, $precision, $function);
    }
}
