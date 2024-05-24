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

use Carbon\CarbonInterface;
use Carbon\Exceptions\UnknownUnitException;

/**
 * Trait Rounding.
 *
 * Round, ceil, floor units.
 *
 * Depends on the following methods:
 *
 * @method static copy()
 * @method static startOfWeek(int $weekStartsAt = null)
 */
trait Rounding
{
    use IntervalRounding;

    /**
     * Round the current instance at the given unit with given precision if specified and the given function.
     *
     * @param string    $unit
     * @param float|int $precision
     * @param string    $function
     *
     * @return CarbonInterface
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
        $metaUnits = [
            // @call roundUnit
            'millennium' => [static::YEARS_PER_MILLENNIUM, 'year'],
            // @call roundUnit
            'century' => [static::YEARS_PER_CENTURY, 'year'],
            // @call roundUnit
            'decade' => [static::YEARS_PER_DECADE, 'year'],
            // @call roundUnit
            'quarter' => [static::MONTHS_PER_QUARTER, 'month'],
            // @call roundUnit
            'millisecond' => [1000, 'microsecond'],
        ];
        $normalizedUnit = static::singularUnit($unit);
<<<<<<< HEAD
        $ranges = array_merge(static::getRangesByUnit($this->daysInMonth), [
=======
        $ranges = array_merge(static::getRangesByUnit(), [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // @call roundUnit
            'microsecond' => [0, 999999],
        ]);
        $factor = 1;

        if ($normalizedUnit === 'week') {
            $normalizedUnit = 'day';
            $precision *= static::DAYS_PER_WEEK;
        }

        if (isset($metaUnits[$normalizedUnit])) {
            [$factor, $normalizedUnit] = $metaUnits[$normalizedUnit];
        }

        $precision *= $factor;

        if (!isset($ranges[$normalizedUnit])) {
            throw new UnknownUnitException($unit);
        }

        $found = false;
        $fraction = 0;
        $arguments = null;
<<<<<<< HEAD
        $initialValue = null;
        $factor = $this->year < 0 ? -1 : 1;
        $changes = [];
        $minimumInc = null;
=======
        $factor = $this->year < 0 ? -1 : 1;
        $changes = [];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($ranges as $unit => [$minimum, $maximum]) {
            if ($normalizedUnit === $unit) {
                $arguments = [$this->$unit, $minimum];
<<<<<<< HEAD
                $initialValue = $this->$unit;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $fraction = $precision - floor($precision);
                $found = true;

                continue;
            }

            if ($found) {
                $delta = $maximum + 1 - $minimum;
                $factor /= $delta;
                $fraction *= $delta;
<<<<<<< HEAD
                $inc = ($this->$unit - $minimum) * $factor;

                if ($inc !== 0.0) {
                    $minimumInc = $minimumInc ?? ($arguments[0] / pow(2, 52));

                    // If value is still the same when adding a non-zero increment/decrement,
                    // it means precision got lost in the addition
                    if (abs($inc) < $minimumInc) {
                        $inc = $minimumInc * ($inc < 0 ? -1 : 1);
                    }

                    // If greater than $precision, assume precision loss caused an overflow
                    if ($function !== 'floor' || abs($arguments[0] + $inc - $initialValue) >= $precision) {
                        $arguments[0] += $inc;
                    }
                }

                $changes[$unit] = round(
                    $minimum + ($fraction ? $fraction * $function(($this->$unit - $minimum) / $fraction) : 0)
                );
=======
                $arguments[0] += $this->$unit * $factor;
                $changes[$unit] = round($minimum + ($fraction ? $fraction * call_user_func($function, ($this->$unit - $minimum) / $fraction) : 0));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                // Cannot use modulo as it lose double precision
                while ($changes[$unit] >= $delta) {
                    $changes[$unit] -= $delta;
                }

                $fraction -= floor($fraction);
            }
        }

        [$value, $minimum] = $arguments;
<<<<<<< HEAD
        $normalizedValue = floor($function(($value - $minimum) / $precision) * $precision + $minimum);

        /** @var CarbonInterface $result */
        $result = $this;
=======
        /** @var CarbonInterface $result */
        $result = $this->$normalizedUnit(floor(call_user_func($function, ($value - $minimum) / $precision) * $precision + $minimum));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($changes as $unit => $value) {
            $result = $result->$unit($value);
        }

<<<<<<< HEAD
        return $result->$normalizedUnit($normalizedValue);
=======
        return $result;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Truncate the current instance at the given unit with given precision if specified.
     *
     * @param string    $unit
     * @param float|int $precision
     *
     * @return CarbonInterface
     */
    public function floorUnit($unit, $precision = 1)
    {
        return $this->roundUnit($unit, $precision, 'floor');
    }

    /**
     * Ceil the current instance at the given unit with given precision if specified.
     *
     * @param string    $unit
     * @param float|int $precision
     *
     * @return CarbonInterface
     */
    public function ceilUnit($unit, $precision = 1)
    {
        return $this->roundUnit($unit, $precision, 'ceil');
    }

    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
     * @return CarbonInterface
     */
    public function round($precision = 1, $function = 'round')
    {
        return $this->roundWith($precision, $function);
    }

    /**
     * Round the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return CarbonInterface
     */
    public function floor($precision = 1)
    {
        return $this->round($precision, 'floor');
    }

    /**
     * Ceil the current instance second with given precision if specified.
     *
     * @param float|int|string|\DateInterval|null $precision
     *
     * @return CarbonInterface
     */
    public function ceil($precision = 1)
    {
        return $this->round($precision, 'ceil');
    }

    /**
     * Round the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function roundWeek($weekStartsAt = null)
    {
<<<<<<< HEAD
        return $this->closest(
            $this->avoidMutation()->floorWeek($weekStartsAt),
            $this->avoidMutation()->ceilWeek($weekStartsAt)
        );
=======
        return $this->closest($this->copy()->floorWeek($weekStartsAt), $this->copy()->ceilWeek($weekStartsAt));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Truncate the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function floorWeek($weekStartsAt = null)
    {
        return $this->startOfWeek($weekStartsAt);
    }

    /**
     * Ceil the current instance week.
     *
     * @param int $weekStartsAt optional start allow you to specify the day of week to use to start the week
     *
     * @return CarbonInterface
     */
    public function ceilWeek($weekStartsAt = null)
    {
        if ($this->isMutable()) {
<<<<<<< HEAD
            $startOfWeek = $this->avoidMutation()->startOfWeek($weekStartsAt);
=======
            $startOfWeek = $this->copy()->startOfWeek($weekStartsAt);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            return $startOfWeek != $this ?
                $this->startOfWeek($weekStartsAt)->addWeek() :
                $this;
        }

        $startOfWeek = $this->startOfWeek($weekStartsAt);

        return $startOfWeek != $this ?
            $startOfWeek->addWeek() :
<<<<<<< HEAD
            $this->avoidMutation();
=======
            $this->copy();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
