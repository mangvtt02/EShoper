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

namespace Carbon;

use Carbon\Exceptions\EndLessPeriodException;
=======
namespace Carbon;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Carbon\Exceptions\InvalidCastException;
use Carbon\Exceptions\InvalidIntervalException;
use Carbon\Exceptions\InvalidPeriodDateException;
use Carbon\Exceptions\InvalidPeriodParameterException;
use Carbon\Exceptions\NotACarbonClassException;
use Carbon\Exceptions\NotAPeriodException;
use Carbon\Exceptions\UnknownGetterException;
use Carbon\Exceptions\UnknownMethodException;
use Carbon\Exceptions\UnreachableException;
use Carbon\Traits\IntervalRounding;
use Carbon\Traits\Mixin;
use Carbon\Traits\Options;
<<<<<<< HEAD
use Carbon\Traits\ToStringFormat;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Closure;
use Countable;
use DateInterval;
use DatePeriod;
use DateTime;
<<<<<<< HEAD
use DateTimeImmutable;
use DateTimeInterface;
use DateTimeZone;
=======
use DateTimeInterface;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use InvalidArgumentException;
use Iterator;
use JsonSerializable;
use ReflectionException;
<<<<<<< HEAD
use ReturnTypeWillChange;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use RuntimeException;

/**
 * Substitution of DatePeriod with some modifications and many more features.
 *
<<<<<<< HEAD
 * @property-read int|float $recurrences number of recurrences (if end not set).
=======
 * @property-read int $recurrences number of recurrences (if end not set).
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @property-read bool $include_start_date rather the start date is included in the iteration.
 * @property-read bool $include_end_date rather the end date is included in the iteration (if recurrences not set).
 * @property-read CarbonInterface $start Period start date.
 * @property-read CarbonInterface $current Current date from the iteration.
 * @property-read CarbonInterface $end Period end date.
 * @property-read CarbonInterval $interval Underlying date interval instance. Always present, one day by default.
 *
<<<<<<< HEAD
 * @method static static start($date, $inclusive = null) Create instance specifying start date or modify the start date if called on an instance.
 * @method static static since($date, $inclusive = null) Alias for start().
 * @method static static sinceNow($inclusive = null) Create instance with start date set to now or set the start date to now if called on an instance.
 * @method static static end($date = null, $inclusive = null) Create instance specifying end date or modify the end date if called on an instance.
 * @method static static until($date = null, $inclusive = null) Alias for end().
 * @method static static untilNow($inclusive = null) Create instance with end date set to now or set the end date to now if called on an instance.
 * @method static static dates($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static static between($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static static recurrences($recurrences = null) Create instance with maximum number of recurrences or modify the number of recurrences if called on an instance.
 * @method static static times($recurrences = null) Alias for recurrences().
 * @method static static options($options = null) Create instance with options or modify the options if called on an instance.
 * @method static static toggle($options, $state = null) Create instance with options toggled on or off, or toggle options if called on an instance.
 * @method static static filter($callback, $name = null) Create instance with filter added to the stack or append a filter if called on an instance.
 * @method static static push($callback, $name = null) Alias for filter().
 * @method static static prepend($callback, $name = null) Create instance with filter prepended to the stack or prepend a filter if called on an instance.
 * @method static static filters(array $filters = []) Create instance with filters stack or replace the whole filters stack if called on an instance.
 * @method static static interval($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static static each($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static static every($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static static step($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static static stepBy($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static static invert() Create instance with inverted date interval or invert the interval if called on an instance.
 * @method static static years($years = 1) Create instance specifying a number of years for date interval or replace the interval by the given a number of years if called on an instance.
 * @method static static year($years = 1) Alias for years().
 * @method static static months($months = 1) Create instance specifying a number of months for date interval or replace the interval by the given a number of months if called on an instance.
 * @method static static month($months = 1) Alias for months().
 * @method static static weeks($weeks = 1) Create instance specifying a number of weeks for date interval or replace the interval by the given a number of weeks if called on an instance.
 * @method static static week($weeks = 1) Alias for weeks().
 * @method static static days($days = 1) Create instance specifying a number of days for date interval or replace the interval by the given a number of days if called on an instance.
 * @method static static dayz($days = 1) Alias for days().
 * @method static static day($days = 1) Alias for days().
 * @method static static hours($hours = 1) Create instance specifying a number of hours for date interval or replace the interval by the given a number of hours if called on an instance.
 * @method static static hour($hours = 1) Alias for hours().
 * @method static static minutes($minutes = 1) Create instance specifying a number of minutes for date interval or replace the interval by the given a number of minutes if called on an instance.
 * @method static static minute($minutes = 1) Alias for minutes().
 * @method static static seconds($seconds = 1) Create instance specifying a number of seconds for date interval or replace the interval by the given a number of seconds if called on an instance.
 * @method static static second($seconds = 1) Alias for seconds().
 * @method static static milliseconds($milliseconds = 1) Create instance specifying a number of milliseconds for date interval or replace the interval by the given a number of milliseconds if called on an instance.
 * @method static static millisecond($milliseconds = 1) Alias for milliseconds().
 * @method static static microseconds($microseconds = 1) Create instance specifying a number of microseconds for date interval or replace the interval by the given a number of microseconds if called on an instance.
 * @method static static microsecond($microseconds = 1) Alias for microseconds().
=======
 * @method static CarbonPeriod start($date, $inclusive = null) Create instance specifying start date or modify the start date if called on an instance.
 * @method static CarbonPeriod since($date, $inclusive = null) Alias for start().
 * @method static CarbonPeriod sinceNow($inclusive = null) Create instance with start date set to now or set the start date to now if called on an instance.
 * @method static CarbonPeriod end($date = null, $inclusive = null) Create instance specifying end date or modify the end date if called on an instance.
 * @method static CarbonPeriod until($date = null, $inclusive = null) Alias for end().
 * @method static CarbonPeriod untilNow($inclusive = null) Create instance with end date set to now or set the end date to now if called on an instance.
 * @method static CarbonPeriod dates($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static CarbonPeriod between($start, $end = null) Create instance with start and end dates or modify the start and end dates if called on an instance.
 * @method static CarbonPeriod recurrences($recurrences = null) Create instance with maximum number of recurrences or modify the number of recurrences if called on an instance.
 * @method static CarbonPeriod times($recurrences = null) Alias for recurrences().
 * @method static CarbonPeriod options($options = null) Create instance with options or modify the options if called on an instance.
 * @method static CarbonPeriod toggle($options, $state = null) Create instance with options toggled on or off, or toggle options if called on an instance.
 * @method static CarbonPeriod filter($callback, $name = null) Create instance with filter added to the stack or append a filter if called on an instance.
 * @method static CarbonPeriod push($callback, $name = null) Alias for filter().
 * @method static CarbonPeriod prepend($callback, $name = null) Create instance with filter prepended to the stack or prepend a filter if called on an instance.
 * @method static CarbonPeriod filters(array $filters = []) Create instance with filters stack or replace the whole filters stack if called on an instance.
 * @method static CarbonPeriod interval($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod each($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod every($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod step($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod stepBy($interval) Create instance with given date interval or modify the interval if called on an instance.
 * @method static CarbonPeriod invert() Create instance with inverted date interval or invert the interval if called on an instance.
 * @method static CarbonPeriod years($years = 1) Create instance specifying a number of years for date interval or replace the interval by the given a number of years if called on an instance.
 * @method static CarbonPeriod year($years = 1) Alias for years().
 * @method static CarbonPeriod months($months = 1) Create instance specifying a number of months for date interval or replace the interval by the given a number of months if called on an instance.
 * @method static CarbonPeriod month($months = 1) Alias for months().
 * @method static CarbonPeriod weeks($weeks = 1) Create instance specifying a number of weeks for date interval or replace the interval by the given a number of weeks if called on an instance.
 * @method static CarbonPeriod week($weeks = 1) Alias for weeks().
 * @method static CarbonPeriod days($days = 1) Create instance specifying a number of days for date interval or replace the interval by the given a number of days if called on an instance.
 * @method static CarbonPeriod dayz($days = 1) Alias for days().
 * @method static CarbonPeriod day($days = 1) Alias for days().
 * @method static CarbonPeriod hours($hours = 1) Create instance specifying a number of hours for date interval or replace the interval by the given a number of hours if called on an instance.
 * @method static CarbonPeriod hour($hours = 1) Alias for hours().
 * @method static CarbonPeriod minutes($minutes = 1) Create instance specifying a number of minutes for date interval or replace the interval by the given a number of minutes if called on an instance.
 * @method static CarbonPeriod minute($minutes = 1) Alias for minutes().
 * @method static CarbonPeriod seconds($seconds = 1) Create instance specifying a number of seconds for date interval or replace the interval by the given a number of seconds if called on an instance.
 * @method static CarbonPeriod second($seconds = 1) Alias for seconds().
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 * @method $this roundYear(float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this roundYears(float $precision = 1, string $function = "round") Round the current instance year with given precision using the given function.
 * @method $this floorYear(float $precision = 1) Truncate the current instance year with given precision.
 * @method $this floorYears(float $precision = 1) Truncate the current instance year with given precision.
 * @method $this ceilYear(float $precision = 1) Ceil the current instance year with given precision.
 * @method $this ceilYears(float $precision = 1) Ceil the current instance year with given precision.
 * @method $this roundMonth(float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this roundMonths(float $precision = 1, string $function = "round") Round the current instance month with given precision using the given function.
 * @method $this floorMonth(float $precision = 1) Truncate the current instance month with given precision.
 * @method $this floorMonths(float $precision = 1) Truncate the current instance month with given precision.
 * @method $this ceilMonth(float $precision = 1) Ceil the current instance month with given precision.
 * @method $this ceilMonths(float $precision = 1) Ceil the current instance month with given precision.
 * @method $this roundWeek(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundWeeks(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorWeek(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorWeeks(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilWeek(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilWeeks(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundDay(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this roundDays(float $precision = 1, string $function = "round") Round the current instance day with given precision using the given function.
 * @method $this floorDay(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this floorDays(float $precision = 1) Truncate the current instance day with given precision.
 * @method $this ceilDay(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this ceilDays(float $precision = 1) Ceil the current instance day with given precision.
 * @method $this roundHour(float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this roundHours(float $precision = 1, string $function = "round") Round the current instance hour with given precision using the given function.
 * @method $this floorHour(float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this floorHours(float $precision = 1) Truncate the current instance hour with given precision.
 * @method $this ceilHour(float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this ceilHours(float $precision = 1) Ceil the current instance hour with given precision.
 * @method $this roundMinute(float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this roundMinutes(float $precision = 1, string $function = "round") Round the current instance minute with given precision using the given function.
 * @method $this floorMinute(float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this floorMinutes(float $precision = 1) Truncate the current instance minute with given precision.
 * @method $this ceilMinute(float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this ceilMinutes(float $precision = 1) Ceil the current instance minute with given precision.
 * @method $this roundSecond(float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this roundSeconds(float $precision = 1, string $function = "round") Round the current instance second with given precision using the given function.
 * @method $this floorSecond(float $precision = 1) Truncate the current instance second with given precision.
 * @method $this floorSeconds(float $precision = 1) Truncate the current instance second with given precision.
 * @method $this ceilSecond(float $precision = 1) Ceil the current instance second with given precision.
 * @method $this ceilSeconds(float $precision = 1) Ceil the current instance second with given precision.
 * @method $this roundMillennium(float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this roundMillennia(float $precision = 1, string $function = "round") Round the current instance millennium with given precision using the given function.
 * @method $this floorMillennium(float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this floorMillennia(float $precision = 1) Truncate the current instance millennium with given precision.
 * @method $this ceilMillennium(float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this ceilMillennia(float $precision = 1) Ceil the current instance millennium with given precision.
 * @method $this roundCentury(float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this roundCenturies(float $precision = 1, string $function = "round") Round the current instance century with given precision using the given function.
 * @method $this floorCentury(float $precision = 1) Truncate the current instance century with given precision.
 * @method $this floorCenturies(float $precision = 1) Truncate the current instance century with given precision.
 * @method $this ceilCentury(float $precision = 1) Ceil the current instance century with given precision.
 * @method $this ceilCenturies(float $precision = 1) Ceil the current instance century with given precision.
 * @method $this roundDecade(float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this roundDecades(float $precision = 1, string $function = "round") Round the current instance decade with given precision using the given function.
 * @method $this floorDecade(float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this floorDecades(float $precision = 1) Truncate the current instance decade with given precision.
 * @method $this ceilDecade(float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this ceilDecades(float $precision = 1) Ceil the current instance decade with given precision.
 * @method $this roundQuarter(float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this roundQuarters(float $precision = 1, string $function = "round") Round the current instance quarter with given precision using the given function.
 * @method $this floorQuarter(float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this floorQuarters(float $precision = 1) Truncate the current instance quarter with given precision.
 * @method $this ceilQuarter(float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this ceilQuarters(float $precision = 1) Ceil the current instance quarter with given precision.
 * @method $this roundMillisecond(float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this roundMilliseconds(float $precision = 1, string $function = "round") Round the current instance millisecond with given precision using the given function.
 * @method $this floorMillisecond(float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this floorMilliseconds(float $precision = 1) Truncate the current instance millisecond with given precision.
 * @method $this ceilMillisecond(float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this ceilMilliseconds(float $precision = 1) Ceil the current instance millisecond with given precision.
 * @method $this roundMicrosecond(float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this roundMicroseconds(float $precision = 1, string $function = "round") Round the current instance microsecond with given precision using the given function.
 * @method $this floorMicrosecond(float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this floorMicroseconds(float $precision = 1) Truncate the current instance microsecond with given precision.
 * @method $this ceilMicrosecond(float $precision = 1) Ceil the current instance microsecond with given precision.
 * @method $this ceilMicroseconds(float $precision = 1) Ceil the current instance microsecond with given precision.
<<<<<<< HEAD
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class CarbonPeriod implements Iterator, Countable, JsonSerializable
{
    use IntervalRounding;
    use Mixin {
        Mixin::mixin as baseMixin;
    }
    use Options;
<<<<<<< HEAD
    use ToStringFormat;

    /**
     * Built-in filter for limit by recurrences.
     *
     * @var callable
     */
    public const RECURRENCES_FILTER = [self::class, 'filterRecurrences'];

    /**
     * Built-in filter for limit to an end.
     *
     * @var callable
     */
    public const END_DATE_FILTER = [self::class, 'filterEndDate'];
=======

    /**
     * Built-in filters.
     *
     * @var string
     */
    const RECURRENCES_FILTER = 'Carbon\CarbonPeriod::filterRecurrences';
    const END_DATE_FILTER = 'Carbon\CarbonPeriod::filterEndDate';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Special value which can be returned by filters to end iteration. Also a filter.
     *
<<<<<<< HEAD
     * @var callable
     */
    public const END_ITERATION = [self::class, 'endIteration'];
=======
     * @var string
     */
    const END_ITERATION = 'Carbon\CarbonPeriod::endIteration';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Exclude start date from iteration.
     *
     * @var int
     */
<<<<<<< HEAD
    public const EXCLUDE_START_DATE = 1;
=======
    const EXCLUDE_START_DATE = 1;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Exclude end date from iteration.
     *
     * @var int
     */
<<<<<<< HEAD
    public const EXCLUDE_END_DATE = 2;
=======
    const EXCLUDE_END_DATE = 2;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Yield CarbonImmutable instances.
     *
     * @var int
     */
<<<<<<< HEAD
    public const IMMUTABLE = 4;
=======
    const IMMUTABLE = 4;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Number of maximum attempts before giving up on finding next valid date.
     *
     * @var int
     */
<<<<<<< HEAD
    public const NEXT_MAX_ATTEMPTS = 1000;

    /**
     * Number of maximum attempts before giving up on finding end date.
     *
     * @var int
     */
    public const END_MAX_ATTEMPTS = 10000;

    /**
     * Default date class of iteration items.
     *
     * @var string
     */
    protected const DEFAULT_DATE_CLASS = Carbon::class;
=======
    const NEXT_MAX_ATTEMPTS = 1000;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * The registered macros.
     *
     * @var array
     */
    protected static $macros = [];

    /**
     * Date class of iteration items.
     *
     * @var string
     */
    protected $dateClass = Carbon::class;

    /**
     * Underlying date interval instance. Always present, one day by default.
     *
     * @var CarbonInterval
     */
    protected $dateInterval;

    /**
<<<<<<< HEAD
     * True once __construct is finished.
     *
     * @var bool
     */
    protected $constructed = false;

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Whether current date interval was set by default.
     *
     * @var bool
     */
    protected $isDefaultInterval;

    /**
     * The filters stack.
     *
     * @var array
     */
    protected $filters = [];

    /**
     * Period start date. Applied on rewind. Always present, now by default.
     *
     * @var CarbonInterface
     */
    protected $startDate;

    /**
     * Period end date. For inverted interval should be before the start date. Applied via a filter.
     *
     * @var CarbonInterface|null
     */
    protected $endDate;

    /**
     * Limit for number of recurrences. Applied via a filter.
     *
     * @var int|null
     */
    protected $recurrences;

    /**
     * Iteration options.
     *
     * @var int
     */
    protected $options;

    /**
     * Index of current date. Always sequential, even if some dates are skipped by filters.
     * Equal to null only before the first iteration.
     *
     * @var int
     */
    protected $key;

    /**
     * Current date. May temporarily hold unaccepted value when looking for a next valid date.
     * Equal to null only before the first iteration.
     *
     * @var CarbonInterface
     */
    protected $current;

    /**
     * Timezone of current date. Taken from the start date.
     *
     * @var \DateTimeZone|null
     */
    protected $timezone;

    /**
     * The cached validation result for current date.
     *
     * @var bool|string|null
     */
    protected $validationResult;

    /**
     * Timezone handler for settings() method.
     *
     * @var mixed
     */
    protected $tzName;

    /**
     * Make a CarbonPeriod instance from given variable if possible.
     *
     * @param mixed $var
     *
     * @return static|null
     */
    public static function make($var)
    {
        try {
            return static::instance($var);
        } catch (NotAPeriodException $e) {
            return static::create($var);
        }
    }

    /**
     * Create a new instance from a DatePeriod or CarbonPeriod object.
     *
     * @param CarbonPeriod|DatePeriod $period
     *
     * @return static
     */
    public static function instance($period)
    {
        if ($period instanceof static) {
            return $period->copy();
        }

        if ($period instanceof self) {
            return new static(
                $period->getStartDate(),
                $period->getEndDate() ?: $period->getRecurrences(),
                $period->getDateInterval(),
                $period->getOptions()
            );
        }

        if ($period instanceof DatePeriod) {
            return new static(
                $period->start,
                $period->end ?: ($period->recurrences - 1),
                $period->interval,
                $period->include_start_date ? 0 : static::EXCLUDE_START_DATE
            );
        }

<<<<<<< HEAD
        $class = static::class;
        $type = \gettype($period);
=======
        $class = get_called_class();
        $type = gettype($period);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        throw new NotAPeriodException(
            'Argument 1 passed to '.$class.'::'.__METHOD__.'() '.
            'must be an instance of DatePeriod or '.$class.', '.
<<<<<<< HEAD
            ($type === 'object' ? 'instance of '.\get_class($period) : $type).' given.'
=======
            ($type === 'object' ? 'instance of '.get_class($period) : $type).' given.'
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        );
    }

    /**
     * Create a new instance.
     *
     * @return static
     */
    public static function create(...$params)
    {
        return static::createFromArray($params);
    }

    /**
     * Create a new instance from an array of parameters.
     *
     * @param array $params
     *
     * @return static
     */
    public static function createFromArray(array $params)
    {
        return new static(...$params);
    }

    /**
     * Create CarbonPeriod from ISO 8601 string.
     *
     * @param string   $iso
     * @param int|null $options
     *
     * @return static
     */
    public static function createFromIso($iso, $options = null)
    {
        $params = static::parseIso8601($iso);

        $instance = static::createFromArray($params);

        if ($options !== null) {
            $instance->setOptions($options);
        }

        return $instance;
    }

    /**
     * Return whether given interval contains non zero value of any time unit.
     *
     * @param \DateInterval $interval
     *
     * @return bool
     */
    protected static function intervalHasTime(DateInterval $interval)
    {
        return $interval->h || $interval->i || $interval->s || $interval->f;
    }

    /**
     * Return whether given variable is an ISO 8601 specification.
     *
     * Note: Check is very basic, as actual validation will be done later when parsing.
     * We just want to ensure that variable is not any other type of a valid parameter.
     *
     * @param mixed $var
     *
     * @return bool
     */
    protected static function isIso8601($var)
    {
<<<<<<< HEAD
        if (!\is_string($var)) {
=======
        if (!is_string($var)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        // Match slash but not within a timezone name.
        $part = '[a-z]+(?:[_-][a-z]+)*';

        preg_match("#\b$part/$part\b|(/)#i", $var, $match);

        return isset($match[1]);
    }

    /**
     * Parse given ISO 8601 string into an array of arguments.
     *
     * @SuppressWarnings(PHPMD.ElseExpression)
     *
     * @param string $iso
     *
     * @return array
     */
    protected static function parseIso8601($iso)
    {
        $result = [];

        $interval = null;
        $start = null;
        $end = null;
<<<<<<< HEAD
        $dateClass = static::DEFAULT_DATE_CLASS;

        foreach (explode('/', $iso) as $key => $part) {
            if ($key === 0 && preg_match('/^R(\d*|INF)$/', $part, $match)) {
                $parsed = \strlen($match[1]) ? (($match[1] !== 'INF') ? (int) $match[1] : INF) : null;
            } elseif ($interval === null && $parsed = CarbonInterval::make($part)) {
                $interval = $part;
            } elseif ($start === null && $parsed = $dateClass::make($part)) {
                $start = $part;
            } elseif ($end === null && $parsed = $dateClass::make(static::addMissingParts($start ?? '', $part))) {
=======

        foreach (explode('/', $iso) as $key => $part) {
            if ($key === 0 && preg_match('/^R([0-9]*)$/', $part, $match)) {
                $parsed = strlen($match[1]) ? (int) $match[1] : null;
            } elseif ($interval === null && $parsed = CarbonInterval::make($part)) {
                $interval = $part;
            } elseif ($start === null && $parsed = Carbon::make($part)) {
                $start = $part;
            } elseif ($end === null && $parsed = Carbon::make(static::addMissingParts($start, $part))) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $end = $part;
            } else {
                throw new InvalidPeriodParameterException("Invalid ISO 8601 specification: $iso.");
            }

            $result[] = $parsed;
        }

        return $result;
    }

    /**
<<<<<<< HEAD
     * Add missing parts of the target date from the source date.
=======
     * Add missing parts of the target date from the soure date.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param string $source
     * @param string $target
     *
     * @return string
     */
    protected static function addMissingParts($source, $target)
    {
<<<<<<< HEAD
        $pattern = '/'.preg_replace('/\d+/', '[0-9]+', preg_quote($target, '/')).'$/';
=======
        $pattern = '/'.preg_replace('/[0-9]+/', '[0-9]+', preg_quote($target, '/')).'$/';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $result = preg_replace($pattern, $target, $source, 1, $count);

        return $count ? $result : $target;
    }

    /**
     * Register a custom macro.
     *
     * @example
     * ```
     * CarbonPeriod::macro('middle', function () {
     *   return $this->getStartDate()->average($this->getEndDate());
     * });
     * echo CarbonPeriod::since('2011-05-12')->until('2011-06-03')->middle();
     * ```
     *
     * @param string          $name
     * @param object|callable $macro
     *
     * @return void
     */
    public static function macro($name, $macro)
    {
        static::$macros[$name] = $macro;
    }

    /**
     * Register macros from a mixin object.
     *
     * @example
     * ```
     * CarbonPeriod::mixin(new class {
     *   public function addDays() {
     *     return function ($count = 1) {
     *       return $this->setStartDate(
     *         $this->getStartDate()->addDays($count)
     *       )->setEndDate(
     *         $this->getEndDate()->addDays($count)
     *       );
     *     };
     *   }
     *   public function subDays() {
     *     return function ($count = 1) {
     *       return $this->setStartDate(
     *         $this->getStartDate()->subDays($count)
     *       )->setEndDate(
     *         $this->getEndDate()->subDays($count)
     *       );
     *     };
     *   }
     * });
     * echo CarbonPeriod::create('2000-01-01', '2000-02-01')->addDays(5)->subDays(3);
     * ```
     *
     * @param object|string $mixin
     *
     * @throws ReflectionException
     *
     * @return void
     */
    public static function mixin($mixin)
    {
        static::baseMixin($mixin);
    }

    /**
     * Check if macro is registered.
     *
     * @param string $name
     *
     * @return bool
     */
    public static function hasMacro($name)
    {
        return isset(static::$macros[$name]);
    }

    /**
     * Provide static proxy for instance aliases.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public static function __callStatic($method, $parameters)
    {
<<<<<<< HEAD
        $date = new static();

        if (static::hasMacro($method)) {
            return static::bindMacroContext(null, function () use (&$method, &$parameters, &$date) {
                return $date->callMacro($method, $parameters);
            });
        }

        return $date->$method(...$parameters);
=======
        return (new static)->$method(...$parameters);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * CarbonPeriod constructor.
     *
     * @SuppressWarnings(PHPMD.ElseExpression)
     *
     * @throws InvalidArgumentException
     */
    public function __construct(...$arguments)
    {
<<<<<<< HEAD
        if (is_a($this->dateClass, DateTimeImmutable::class, true)) {
            $this->options = static::IMMUTABLE;
        }

        // Parse and assign arguments one by one. First argument may be an ISO 8601 spec,
        // which will be first parsed into parts and then processed the same way.

        $argumentsCount = \count($arguments);
=======
        // Parse and assign arguments one by one. First argument may be an ISO 8601 spec,
        // which will be first parsed into parts and then processed the same way.

        $argumentsCount = count($arguments);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($argumentsCount && static::isIso8601($iso = $arguments[0])) {
            array_splice($arguments, 0, 1, static::parseIso8601($iso));
        }

        if ($argumentsCount === 1) {
            if ($arguments[0] instanceof DatePeriod) {
                $arguments = [
                    $arguments[0]->start,
                    $arguments[0]->end ?: ($arguments[0]->recurrences - 1),
                    $arguments[0]->interval,
                    $arguments[0]->include_start_date ? 0 : static::EXCLUDE_START_DATE,
                ];
            } elseif ($arguments[0] instanceof self) {
                $arguments = [
                    $arguments[0]->getStartDate(),
                    $arguments[0]->getEndDate() ?: $arguments[0]->getRecurrences(),
                    $arguments[0]->getDateInterval(),
                    $arguments[0]->getOptions(),
                ];
            }
        }

<<<<<<< HEAD
        $optionsSet = false;

        foreach ($arguments as $argument) {
            $parsedDate = null;

            if ($argument instanceof DateTimeZone) {
                $this->setTimezone($argument);
            } elseif ($this->dateInterval === null &&
                (
                    (\is_string($argument) && preg_match(
                        '/^(-?\d(\d(?![\/-])|[^\d\/-]([\/-])?)*|P[T\d].*|(?:\h*\d+(?:\.\d+)?\h*[a-z]+)+)$/i',
                        $argument
                    )) ||
                    $argument instanceof DateInterval ||
                    $argument instanceof Closure
                ) &&
                $parsedInterval = @CarbonInterval::make($argument)
            ) {
                $this->setDateInterval($parsedInterval);
            } elseif ($this->startDate === null && $parsedDate = $this->makeDateTime($argument)) {
                $this->setStartDate($parsedDate);
            } elseif ($this->endDate === null && ($parsedDate = $parsedDate ?? $this->makeDateTime($argument))) {
                $this->setEndDate($parsedDate);
            } elseif ($this->recurrences === null && $this->endDate === null && is_numeric($argument)) {
                $this->setRecurrences($argument);
            } elseif (!$optionsSet && (\is_int($argument) || $argument === null)) {
                $optionsSet = true;
                $this->setOptions(((int) $this->options) | ((int) $argument));
=======
        foreach ($arguments as $argument) {
            if ($this->dateInterval === null &&
                (
                    is_string($argument) && preg_match(
                        '/^(\d(\d(?![\/-])|[^\d\/-]([\/-])?)*|P[T0-9].*|(?:\h*\d+(?:\.\d+)?\h*[a-z]+)+)$/i',
                        $argument
                    ) ||
                    $argument instanceof DateInterval ||
                    $argument instanceof Closure
                ) &&
                $parsed = @CarbonInterval::make($argument)
            ) {
                $this->setDateInterval($parsed);
            } elseif ($this->startDate === null && $parsed = Carbon::make($argument)) {
                $this->setStartDate($parsed);
            } elseif ($this->endDate === null && $parsed = Carbon::make($argument)) {
                $this->setEndDate($parsed);
            } elseif ($this->recurrences === null && $this->endDate === null && is_numeric($argument)) {
                $this->setRecurrences($argument);
            } elseif ($this->options === null && (is_int($argument) || $argument === null)) {
                $this->setOptions($argument);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } else {
                throw new InvalidPeriodParameterException('Invalid constructor parameters.');
            }
        }

        if ($this->startDate === null) {
<<<<<<< HEAD
            $dateClass = $this->dateClass;
            $this->setStartDate($dateClass::now());
=======
            $this->setStartDate(Carbon::now());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($this->dateInterval === null) {
            $this->setDateInterval(CarbonInterval::day());

            $this->isDefaultInterval = true;
        }

        if ($this->options === null) {
            $this->setOptions(0);
        }
<<<<<<< HEAD

        $this->constructed = true;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get a copy of the instance.
     *
     * @return static
     */
    public function copy()
    {
        return clone $this;
    }

    /**
<<<<<<< HEAD
     * Prepare the instance to be set (self if mutable to be mutated,
     * copy if immutable to generate a new instance).
     *
     * @return static
     */
    protected function copyIfImmutable()
    {
        return $this;
    }

    /**
     * Get the getter for a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return callable|null
     */
    protected function getGetter(string $name)
    {
        switch (strtolower(preg_replace('/[A-Z]/', '_$0', $name))) {
            case 'start':
            case 'start_date':
                return [$this, 'getStartDate'];
            case 'end':
            case 'end_date':
                return [$this, 'getEndDate'];
            case 'interval':
            case 'date_interval':
                return [$this, 'getDateInterval'];
            case 'recurrences':
                return [$this, 'getRecurrences'];
            case 'include_start_date':
                return [$this, 'isStartIncluded'];
            case 'include_end_date':
                return [$this, 'isEndIncluded'];
            case 'current':
                return [$this, 'current'];
            default:
                return null;
        }
    }

    /**
     * Get a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return bool|CarbonInterface|CarbonInterval|int|null
     */
    public function get(string $name)
    {
        $getter = $this->getGetter($name);

        if ($getter) {
            return $getter();
        }

        throw new UnknownGetterException($name);
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Get a property allowing both `DatePeriod` snakeCase and camelCase names.
     *
     * @param string $name
     *
     * @return bool|CarbonInterface|CarbonInterval|int|null
     */
    public function __get(string $name)
    {
<<<<<<< HEAD
        return $this->get($name);
=======
        switch (strtolower(preg_replace('/[A-Z]/', '_$0', $name))) {
            case 'start':
            case 'start_date':
                return $this->getStartDate();
            case 'end':
            case 'end_date':
                return $this->getEndDate();
            case 'interval':
            case 'date_interval':
                return $this->getDateInterval();
            case 'recurrences':
                return $this->getRecurrences();
            case 'include_start_date':
                return $this->isStartIncluded();
            case 'include_end_date':
                return $this->isEndIncluded();
            case 'current':
                return $this->current();
            default:
                throw new UnknownGetterException($name);
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Check if an attribute exists on the object
     *
     * @param string $name
     *
     * @return bool
     */
    public function __isset(string $name): bool
    {
<<<<<<< HEAD
        return $this->getGetter($name) !== null;
=======
        try {
            $this->__get($name);
        } catch (UnknownGetterException | ReflectionException $e) {
            return false;
        }

        return true;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @alias copy
     *
     * Get a copy of the instance.
     *
     * @return static
     */
    public function clone()
    {
        return clone $this;
    }

    /**
     * Set the iteration item class.
     *
     * @param string $dateClass
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setDateClass(string $dateClass)
    {
        if (!is_a($dateClass, CarbonInterface::class, true)) {
            throw new NotACarbonClassException($dateClass);
        }

<<<<<<< HEAD
        $self = $this->copyIfImmutable();
        $self->dateClass = $dateClass;

        if (is_a($dateClass, Carbon::class, true)) {
            $self->options = $self->options & ~static::IMMUTABLE;
        } elseif (is_a($dateClass, CarbonImmutable::class, true)) {
            $self->options = $self->options | static::IMMUTABLE;
        }

        return $self;
=======
        $this->dateClass = $dateClass;

        if (is_a($dateClass, Carbon::class, true)) {
            $this->toggleOptions(static::IMMUTABLE, false);
        } elseif (is_a($dateClass, CarbonImmutable::class, true)) {
            $this->toggleOptions(static::IMMUTABLE, true);
        }

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Returns iteration item date class.
     *
     * @return string
     */
    public function getDateClass(): string
    {
        return $this->dateClass;
    }

    /**
     * Change the period date interval.
     *
     * @param DateInterval|string $interval
     *
     * @throws InvalidIntervalException
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setDateInterval($interval)
    {
        if (!$interval = CarbonInterval::make($interval)) {
            throw new InvalidIntervalException('Invalid interval.');
        }

        if ($interval->spec() === 'PT0S' && !$interval->f && !$interval->getStep()) {
            throw new InvalidIntervalException('Empty interval is not accepted.');
        }

<<<<<<< HEAD
        $self = $this->copyIfImmutable();
        $self->dateInterval = $interval;

        $self->isDefaultInterval = false;

        $self->handleChangedParameters();

        return $self;
=======
        $this->dateInterval = $interval;

        $this->isDefaultInterval = false;

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Invert the period date interval.
     *
<<<<<<< HEAD
     * @return static
     */
    public function invertDateInterval()
    {
        return $this->setDateInterval($this->dateInterval->invert());
=======
     * @return $this
     */
    public function invertDateInterval()
    {
        $interval = $this->dateInterval->invert();

        return $this->setDateInterval($interval);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Set start and end date.
     *
     * @param DateTime|DateTimeInterface|string      $start
     * @param DateTime|DateTimeInterface|string|null $end
     *
<<<<<<< HEAD
     * @return static
     */
    public function setDates($start, $end)
    {
        return $this->setStartDate($start)->setEndDate($end);
=======
     * @return $this
     */
    public function setDates($start, $end)
    {
        $this->setStartDate($start);
        $this->setEndDate($end);

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Change the period options.
     *
     * @param int|null $options
     *
     * @throws InvalidArgumentException
     *
<<<<<<< HEAD
     * @return static
     */
    public function setOptions($options)
    {
        if (!\is_int($options) && $options !== null) {
            throw new InvalidPeriodParameterException('Invalid options.');
        }

        $self = $this->copyIfImmutable();
        $self->options = $options ?: 0;

        $self->handleChangedParameters();

        return $self;
=======
     * @return $this
     */
    public function setOptions($options)
    {
        if (!is_int($options) && !is_null($options)) {
            throw new InvalidPeriodParameterException('Invalid options.');
        }

        $this->options = $options ?: 0;

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Get the period options.
     *
     * @return int
     */
    public function getOptions()
    {
        return $this->options;
    }

    /**
     * Toggle given options on or off.
     *
     * @param int       $options
     * @param bool|null $state
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function toggleOptions($options, $state = null)
    {
        if ($state === null) {
            $state = ($this->options & $options) !== $options;
        }

        return $this->setOptions(
            $state ?
            $this->options | $options :
            $this->options & ~$options
        );
    }

    /**
     * Toggle EXCLUDE_START_DATE option.
     *
     * @param bool $state
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function excludeStartDate($state = true)
    {
        return $this->toggleOptions(static::EXCLUDE_START_DATE, $state);
    }

    /**
     * Toggle EXCLUDE_END_DATE option.
     *
     * @param bool $state
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function excludeEndDate($state = true)
    {
        return $this->toggleOptions(static::EXCLUDE_END_DATE, $state);
    }

    /**
     * Get the underlying date interval.
     *
     * @return CarbonInterval
     */
    public function getDateInterval()
    {
        return $this->dateInterval->copy();
    }

    /**
     * Get start date of the period.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface
     */
    public function getStartDate(string $rounding = null)
    {
<<<<<<< HEAD
        $date = $this->startDate->avoidMutation();
=======
        $date = $this->startDate->copy();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $rounding ? $date->round($this->getDateInterval(), $rounding) : $date;
    }

    /**
     * Get end date of the period.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface|null
     */
    public function getEndDate(string $rounding = null)
    {
        if (!$this->endDate) {
            return null;
        }

<<<<<<< HEAD
        $date = $this->endDate->avoidMutation();
=======
        $date = $this->endDate->copy();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $rounding ? $date->round($this->getDateInterval(), $rounding) : $date;
    }

    /**
     * Get number of recurrences.
     *
<<<<<<< HEAD
     * @return int|float|null
=======
     * @return int|null
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getRecurrences()
    {
        return $this->recurrences;
    }

    /**
     * Returns true if the start date should be excluded.
     *
     * @return bool
     */
    public function isStartExcluded()
    {
        return ($this->options & static::EXCLUDE_START_DATE) !== 0;
    }

    /**
     * Returns true if the end date should be excluded.
     *
     * @return bool
     */
    public function isEndExcluded()
    {
        return ($this->options & static::EXCLUDE_END_DATE) !== 0;
    }

    /**
     * Returns true if the start date should be included.
     *
     * @return bool
     */
    public function isStartIncluded()
    {
        return !$this->isStartExcluded();
    }

    /**
     * Returns true if the end date should be included.
     *
     * @return bool
     */
    public function isEndIncluded()
    {
        return !$this->isEndExcluded();
    }

    /**
     * Return the start if it's included by option, else return the start + 1 period interval.
     *
     * @return CarbonInterface
     */
    public function getIncludedStartDate()
    {
        $start = $this->getStartDate();

        if ($this->isStartExcluded()) {
            return $start->add($this->getDateInterval());
        }

        return $start;
    }

    /**
     * Return the end if it's included by option, else return the end - 1 period interval.
     * Warning: if the period has no fixed end, this method will iterate the period to calculate it.
     *
     * @return CarbonInterface
     */
    public function getIncludedEndDate()
    {
        $end = $this->getEndDate();

        if (!$end) {
            return $this->calculateEnd();
        }

        if ($this->isEndExcluded()) {
            return $end->sub($this->getDateInterval());
        }

        return $end;
    }

    /**
     * Add a filter to the stack.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param callable $callback
     * @param string   $name
     *
<<<<<<< HEAD
     * @return static
     */
    public function addFilter($callback, $name = null)
    {
        $self = $this->copyIfImmutable();
        $tuple = $self->createFilterTuple(\func_get_args());

        $self->filters[] = $tuple;

        $self->handleChangedParameters();

        return $self;
=======
     * @return $this
     */
    public function addFilter($callback, $name = null)
    {
        $tuple = $this->createFilterTuple(func_get_args());

        $this->filters[] = $tuple;

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Prepend a filter to the stack.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param callable $callback
     * @param string   $name
     *
<<<<<<< HEAD
     * @return static
     */
    public function prependFilter($callback, $name = null)
    {
        $self = $this->copyIfImmutable();
        $tuple = $self->createFilterTuple(\func_get_args());

        array_unshift($self->filters, $tuple);

        $self->handleChangedParameters();

        return $self;
=======
     * @return $this
     */
    public function prependFilter($callback, $name = null)
    {
        $tuple = $this->createFilterTuple(func_get_args());

        array_unshift($this->filters, $tuple);

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Remove a filter by instance or name.
     *
     * @param callable|string $filter
     *
<<<<<<< HEAD
     * @return static
     */
    public function removeFilter($filter)
    {
        $self = $this->copyIfImmutable();
        $key = \is_callable($filter) ? 0 : 1;

        $self->filters = array_values(array_filter(
=======
     * @return $this
     */
    public function removeFilter($filter)
    {
        $key = is_callable($filter) ? 0 : 1;

        $this->filters = array_values(array_filter(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->filters,
            function ($tuple) use ($key, $filter) {
                return $tuple[$key] !== $filter;
            }
        ));

<<<<<<< HEAD
        $self->updateInternalState();

        $self->handleChangedParameters();

        return $self;
=======
        $this->updateInternalState();

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return whether given instance or name is in the filter stack.
     *
     * @param callable|string $filter
     *
     * @return bool
     */
    public function hasFilter($filter)
    {
<<<<<<< HEAD
        $key = \is_callable($filter) ? 0 : 1;
=======
        $key = is_callable($filter) ? 0 : 1;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($this->filters as $tuple) {
            if ($tuple[$key] === $filter) {
                return true;
            }
        }

        return false;
    }

    /**
     * Get filters stack.
     *
     * @return array
     */
    public function getFilters()
    {
        return $this->filters;
    }

    /**
     * Set filters stack.
     *
     * @param array $filters
     *
<<<<<<< HEAD
     * @return static
     */
    public function setFilters(array $filters)
    {
        $self = $this->copyIfImmutable();
        $self->filters = $filters;

        $self->updateInternalState();

        $self->handleChangedParameters();

        return $self;
=======
     * @return $this
     */
    public function setFilters(array $filters)
    {
        $this->filters = $filters;

        $this->updateInternalState();

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Reset filters stack.
     *
<<<<<<< HEAD
     * @return static
     */
    public function resetFilters()
    {
        $self = $this->copyIfImmutable();
        $self->filters = [];

        if ($self->endDate !== null) {
            $self->filters[] = [static::END_DATE_FILTER, null];
        }

        if ($self->recurrences !== null) {
            $self->filters[] = [static::RECURRENCES_FILTER, null];
        }

        $self->handleChangedParameters();

        return $self;
=======
     * @return $this
     */
    public function resetFilters()
    {
        $this->filters = [];

        if ($this->endDate !== null) {
            $this->filters[] = [static::END_DATE_FILTER, null];
        }

        if ($this->recurrences !== null) {
            $this->filters[] = [static::RECURRENCES_FILTER, null];
        }

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Add a recurrences filter (set maximum number of recurrences).
     *
<<<<<<< HEAD
     * @param int|float|null $recurrences
     *
     * @throws InvalidArgumentException
     *
     * @return static
     */
    public function setRecurrences($recurrences)
    {
        if ((!is_numeric($recurrences) && $recurrences !== null) || $recurrences < 0) {
=======
     * @param int|null $recurrences
     *
     * @throws \InvalidArgumentException
     *
     * @return $this
     */
    public function setRecurrences($recurrences)
    {
        if (!is_numeric($recurrences) && !is_null($recurrences) || $recurrences < 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new InvalidPeriodParameterException('Invalid number of recurrences.');
        }

        if ($recurrences === null) {
            return $this->removeFilter(static::RECURRENCES_FILTER);
        }

<<<<<<< HEAD
        /** @var self $self */
        $self = $this->copyIfImmutable();
        $self->recurrences = $recurrences === INF ? INF : (int) $recurrences;

        if (!$self->hasFilter(static::RECURRENCES_FILTER)) {
            return $self->addFilter(static::RECURRENCES_FILTER);
        }

        $self->handleChangedParameters();

        return $self;
=======
        $this->recurrences = (int) $recurrences;

        if (!$this->hasFilter(static::RECURRENCES_FILTER)) {
            return $this->addFilter(static::RECURRENCES_FILTER);
        }

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Change the period start date.
     *
     * @param DateTime|DateTimeInterface|string $date
     * @param bool|null                         $inclusive
     *
     * @throws InvalidPeriodDateException
     *
<<<<<<< HEAD
     * @return static
     */
    public function setStartDate($date, $inclusive = null)
    {
        if (!$this->isInfiniteDate($date) && !($date = ([$this->dateClass, 'make'])($date))) {
            throw new InvalidPeriodDateException('Invalid start date.');
        }

        $self = $this->copyIfImmutable();
        $self->startDate = $date;

        if ($inclusive !== null) {
            $self = $self->toggleOptions(static::EXCLUDE_START_DATE, !$inclusive);
        }

        return $self;
=======
     * @return $this
     */
    public function setStartDate($date, $inclusive = null)
    {
        if (!$date = call_user_func([$this->dateClass, 'make'], $date)) {
            throw new InvalidPeriodDateException('Invalid start date.');
        }

        $this->startDate = $date;

        if ($inclusive !== null) {
            $this->toggleOptions(static::EXCLUDE_START_DATE, !$inclusive);
        }

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Change the period end date.
     *
     * @param DateTime|DateTimeInterface|string|null $date
     * @param bool|null                              $inclusive
     *
     * @throws \InvalidArgumentException
     *
<<<<<<< HEAD
     * @return static
     */
    public function setEndDate($date, $inclusive = null)
    {
        if ($date !== null && !$this->isInfiniteDate($date) && !$date = ([$this->dateClass, 'make'])($date)) {
=======
     * @return $this
     */
    public function setEndDate($date, $inclusive = null)
    {
        if (!is_null($date) && !$date = call_user_func([$this->dateClass, 'make'], $date)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new InvalidPeriodDateException('Invalid end date.');
        }

        if (!$date) {
            return $this->removeFilter(static::END_DATE_FILTER);
        }

<<<<<<< HEAD
        $self = $this->copyIfImmutable();
        $self->endDate = $date;

        if ($inclusive !== null) {
            $self = $self->toggleOptions(static::EXCLUDE_END_DATE, !$inclusive);
        }

        if (!$self->hasFilter(static::END_DATE_FILTER)) {
            return $self->addFilter(static::END_DATE_FILTER);
        }

        $self->handleChangedParameters();

        return $self;
=======
        $this->endDate = $date;

        if ($inclusive !== null) {
            $this->toggleOptions(static::EXCLUDE_END_DATE, !$inclusive);
        }

        if (!$this->hasFilter(static::END_DATE_FILTER)) {
            return $this->addFilter(static::END_DATE_FILTER);
        }

        $this->handleChangedParameters();

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Check if the current position is valid.
     *
     * @return bool
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function valid()
    {
        return $this->validateCurrentDate() === true;
    }

    /**
     * Return the current key.
     *
     * @return int|null
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function key()
    {
        return $this->valid()
            ? $this->key
            : null;
    }

    /**
     * Return the current date.
     *
     * @return CarbonInterface|null
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function current()
    {
        return $this->valid()
            ? $this->prepareForReturn($this->current)
            : null;
    }

    /**
     * Move forward to the next date.
     *
     * @throws RuntimeException
     *
     * @return void
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function next()
    {
        if ($this->current === null) {
            $this->rewind();
        }

        if ($this->validationResult !== static::END_ITERATION) {
            $this->key++;

            $this->incrementCurrentDateUntilValid();
        }
    }

    /**
     * Rewind to the start date.
     *
     * Iterating over a date in the UTC timezone avoids bug during backward DST change.
     *
     * @see https://bugs.php.net/bug.php?id=72255
     * @see https://bugs.php.net/bug.php?id=74274
     * @see https://wiki.php.net/rfc/datetime_and_daylight_saving_time
     *
     * @throws RuntimeException
     *
     * @return void
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
    public function rewind()
    {
        $this->key = 0;
        $this->current = ([$this->dateClass, 'make'])($this->startDate);
=======
    public function rewind()
    {
        $this->key = 0;
        $this->current = call_user_func([$this->dateClass, 'make'], $this->startDate);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $settings = $this->getSettings();

        if ($this->hasLocalTranslator()) {
            $settings['locale'] = $this->getTranslatorLocale();
        }

        $this->current->settings($settings);
        $this->timezone = static::intervalHasTime($this->dateInterval) ? $this->current->getTimezone() : null;

        if ($this->timezone) {
            $this->current = $this->current->utc();
        }

        $this->validationResult = null;

        if ($this->isStartExcluded() || $this->validateCurrentDate() === false) {
            $this->incrementCurrentDateUntilValid();
        }
    }

    /**
     * Skip iterations and returns iteration state (false if ended, true if still valid).
     *
     * @param int $count steps number to skip (1 by default)
     *
     * @return bool
     */
    public function skip($count = 1)
    {
        for ($i = $count; $this->valid() && $i > 0; $i--) {
            $this->next();
        }

        return $this->valid();
    }

    /**
     * Format the date period as ISO 8601.
     *
     * @return string
     */
    public function toIso8601String()
    {
        $parts = [];

        if ($this->recurrences !== null) {
            $parts[] = 'R'.$this->recurrences;
        }

        $parts[] = $this->startDate->toIso8601String();

        $parts[] = $this->dateInterval->spec();

        if ($this->endDate !== null) {
            $parts[] = $this->endDate->toIso8601String();
        }

        return implode('/', $parts);
    }

    /**
     * Convert the date period into a string.
     *
     * @return string
     */
    public function toString()
    {
<<<<<<< HEAD
        $format = $this->localToStringFormat ?? static::$toStringFormat;

        if ($format instanceof Closure) {
            return $format($this);
        }

        $translator = ([$this->dateClass, 'getTranslator'])();

        $parts = [];

        $format = $format ?? (
            !$this->startDate->isStartOfDay() || ($this->endDate && !$this->endDate->isStartOfDay())
                ? 'Y-m-d H:i:s'
                : 'Y-m-d'
        );
=======
        $translator = call_user_func([$this->dateClass, 'getTranslator']);

        $parts = [];

        $format = !$this->startDate->isStartOfDay() || $this->endDate && !$this->endDate->isStartOfDay()
            ? 'Y-m-d H:i:s'
            : 'Y-m-d';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->recurrences !== null) {
            $parts[] = $this->translate('period_recurrences', [], $this->recurrences, $translator);
        }

        $parts[] = $this->translate('period_interval', [':interval' => $this->dateInterval->forHumans([
            'join' => true,
        ])], null, $translator);

        $parts[] = $this->translate('period_start_date', [':date' => $this->startDate->rawFormat($format)], null, $translator);

        if ($this->endDate !== null) {
            $parts[] = $this->translate('period_end_date', [':date' => $this->endDate->rawFormat($format)], null, $translator);
        }

        $result = implode(' ', $parts);

        return mb_strtoupper(mb_substr($result, 0, 1)).mb_substr($result, 1);
    }

    /**
     * Format the date period as ISO 8601.
     *
     * @return string
     */
    public function spec()
    {
        return $this->toIso8601String();
    }

    /**
     * Cast the current instance into the given class.
     *
     * @param string $className The $className::instance() method will be called to cast the current object.
     *
     * @return DatePeriod
     */
    public function cast(string $className)
    {
        if (!method_exists($className, 'instance')) {
            if (is_a($className, DatePeriod::class, true)) {
                return new $className(
<<<<<<< HEAD
                    $this->rawDate($this->getStartDate()),
                    $this->getDateInterval(),
                    $this->getEndDate() ? $this->rawDate($this->getIncludedEndDate()) : $this->getRecurrences(),
=======
                    $this->getStartDate(),
                    $this->getDateInterval(),
                    $this->getEndDate() ? $this->getIncludedEndDate() : $this->getRecurrences(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $this->isStartExcluded() ? DatePeriod::EXCLUDE_START_DATE : 0
                );
            }

            throw new InvalidCastException("$className has not the instance() method needed to cast the date.");
        }

        return $className::instance($this);
    }

    /**
     * Return native DatePeriod PHP object matching the current instance.
     *
     * @example
     * ```
     * var_dump(CarbonPeriod::create('2021-01-05', '2021-02-15')->toDatePeriod());
     * ```
     *
     * @return DatePeriod
     */
    public function toDatePeriod()
    {
        return $this->cast(DatePeriod::class);
    }

    /**
<<<<<<< HEAD
     * Return `true` if the period has no custom filter and is guaranteed to be endless.
     *
     * Note that we can't check if a period is endless as soon as it has custom filters
     * because filters can emit `CarbonPeriod::END_ITERATION` to stop the iteration in
     * a way we can't predict without actually iterating the period.
     */
    public function isUnfilteredAndEndLess(): bool
    {
        foreach ($this->filters as $filter) {
            switch ($filter) {
                case [static::RECURRENCES_FILTER, null]:
                    if ($this->recurrences !== null && is_finite($this->recurrences)) {
                        return false;
                    }

                    break;

                case [static::END_DATE_FILTER, null]:
                    if ($this->endDate !== null && !$this->endDate->isEndOfTime()) {
                        return false;
                    }

                    break;

                default:
                    return false;
            }
        }

        return true;
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Convert the date period into an array without changing current iteration state.
     *
     * @return CarbonInterface[]
     */
    public function toArray()
    {
<<<<<<< HEAD
        if ($this->isUnfilteredAndEndLess()) {
            throw new EndLessPeriodException("Endless period can't be converted to array nor counted.");
        }

        $state = [
            $this->key,
            $this->current ? $this->current->avoidMutation() : null,
=======
        $state = [
            $this->key,
            $this->current ? $this->current->copy() : null,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->validationResult,
        ];

        $result = iterator_to_array($this);

<<<<<<< HEAD
        [$this->key, $this->current, $this->validationResult] = $state;
=======
        [
            $this->key,
            $this->current,
            $this->validationResult
        ] = $state;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $result;
    }

    /**
     * Count dates in the date period.
     *
     * @return int
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
    public function count()
    {
        return \count($this->toArray());
=======
    public function count()
    {
        return count($this->toArray());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return the first date in the date period.
     *
     * @return CarbonInterface|null
     */
    public function first()
    {
<<<<<<< HEAD
        if ($this->isUnfilteredAndEndLess()) {
            foreach ($this as $date) {
                $this->rewind();

                return $date;
            }

            return null;
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return ($this->toArray() ?: [])[0] ?? null;
    }

    /**
     * Return the last date in the date period.
     *
     * @return CarbonInterface|null
     */
    public function last()
    {
        $array = $this->toArray();

<<<<<<< HEAD
        return $array ? $array[\count($array) - 1] : null;
=======
        return $array ? $array[count($array) - 1] : null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Convert the date period into a string.
     *
     * @return string
     */
    public function __toString()
    {
        return $this->toString();
    }

    /**
     * Add aliases for setters.
     *
     * CarbonPeriod::days(3)->hours(5)->invert()
     *     ->sinceNow()->until('2010-01-10')
     *     ->filter(...)
     *     ->count()
     *
     * Note: We use magic method to let static and instance aliases with the same names.
     *
     * @param string $method
     * @param array  $parameters
     *
     * @return mixed
     */
    public function __call($method, $parameters)
    {
        if (static::hasMacro($method)) {
            return static::bindMacroContext($this, function () use (&$method, &$parameters) {
                return $this->callMacro($method, $parameters);
            });
        }

        $roundedValue = $this->callRoundMethod($method, $parameters);

        if ($roundedValue !== null) {
            return $roundedValue;
        }

<<<<<<< HEAD
        switch ($method) {
            case 'start':
            case 'since':
                self::setDefaultParameters($parameters, [
                    [0, 'date', null],
                ]);

                return $this->setStartDate(...$parameters);

            case 'sinceNow':
                return $this->setStartDate(new Carbon(), ...$parameters);

            case 'end':
            case 'until':
                self::setDefaultParameters($parameters, [
                    [0, 'date', null],
                ]);

                return $this->setEndDate(...$parameters);

            case 'untilNow':
                return $this->setEndDate(new Carbon(), ...$parameters);

            case 'dates':
            case 'between':
                self::setDefaultParameters($parameters, [
                    [0, 'start', null],
                    [1, 'end', null],
                ]);

                return $this->setDates(...$parameters);

            case 'recurrences':
            case 'times':
                self::setDefaultParameters($parameters, [
                    [0, 'recurrences', null],
                ]);

                return $this->setRecurrences(...$parameters);

            case 'options':
                self::setDefaultParameters($parameters, [
                    [0, 'options', null],
                ]);

                return $this->setOptions(...$parameters);

            case 'toggle':
                self::setDefaultParameters($parameters, [
                    [0, 'options', null],
                ]);

                return $this->toggleOptions(...$parameters);

            case 'filter':
            case 'push':
                return $this->addFilter(...$parameters);

            case 'prepend':
                return $this->prependFilter(...$parameters);

            case 'filters':
                self::setDefaultParameters($parameters, [
                    [0, 'filters', []],
                ]);

                return $this->setFilters(...$parameters);
=======
        $first = count($parameters) >= 1 ? $parameters[0] : null;
        $second = count($parameters) >= 2 ? $parameters[1] : null;

        switch ($method) {
            case 'start':
            case 'since':
                return $this->setStartDate($first, $second);

            case 'sinceNow':
                return $this->setStartDate(new Carbon, $first);

            case 'end':
            case 'until':
                return $this->setEndDate($first, $second);

            case 'untilNow':
                return $this->setEndDate(new Carbon, $first);

            case 'dates':
            case 'between':
                return $this->setDates($first, $second);

            case 'recurrences':
            case 'times':
                return $this->setRecurrences($first);

            case 'options':
                return $this->setOptions($first);

            case 'toggle':
                return $this->toggleOptions($first, $second);

            case 'filter':
            case 'push':
                return $this->addFilter($first, $second);

            case 'prepend':
                return $this->prependFilter($first, $second);

            case 'filters':
                return $this->setFilters($first ?: []);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            case 'interval':
            case 'each':
            case 'every':
            case 'step':
            case 'stepBy':
<<<<<<< HEAD
                return $this->setDateInterval(...$parameters);
=======
                return $this->setDateInterval($first);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            case 'invert':
                return $this->invertDateInterval();

            case 'years':
            case 'year':
            case 'months':
            case 'month':
            case 'weeks':
            case 'week':
            case 'days':
            case 'dayz':
            case 'day':
            case 'hours':
            case 'hour':
            case 'minutes':
            case 'minute':
            case 'seconds':
            case 'second':
<<<<<<< HEAD
            case 'milliseconds':
            case 'millisecond':
            case 'microseconds':
            case 'microsecond':
                return $this->setDateInterval((
                    // Override default P1D when instantiating via fluent setters.
                    [$this->isDefaultInterval ? new CarbonInterval('PT0S') : $this->dateInterval, $method]
                )(...$parameters));
        }

        $dateClass = $this->dateClass;

        if ($this->localStrictModeEnabled ?? $dateClass::isStrictModeEnabled()) {
=======
                return $this->setDateInterval(call_user_func(
                    // Override default P1D when instantiating via fluent setters.
                    [$this->isDefaultInterval ? new CarbonInterval('PT0S') : $this->dateInterval, $method],
                    count($parameters) === 0 ? 1 : $first
                ));
        }

        if ($this->localStrictModeEnabled ?? Carbon::isStrictModeEnabled()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new UnknownMethodException($method);
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * Set the instance's timezone from a string or object and apply it to start/end.
     *
     * @param \DateTimeZone|string $timezone
     *
     * @return static
     */
    public function setTimezone($timezone)
    {
        $self = $this->copyIfImmutable();
        $self->tzName = $timezone;
        $self->timezone = $timezone;

        if ($self->startDate) {
            $self = $self->setStartDate($self->startDate->setTimezone($timezone));
        }

        if ($self->endDate) {
            $self = $self->setEndDate($self->endDate->setTimezone($timezone));
        }

        return $self;
    }

    /**
     * Set the instance's timezone from a string or object and add/subtract the offset difference to start/end.
=======
     * Set the instance's timezone from a string or object and add/subtract the offset difference.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param \DateTimeZone|string $timezone
     *
     * @return static
     */
    public function shiftTimezone($timezone)
    {
<<<<<<< HEAD
        $self = $this->copyIfImmutable();
        $self->tzName = $timezone;
        $self->timezone = $timezone;

        if ($self->startDate) {
            $self = $self->setStartDate($self->startDate->shiftTimezone($timezone));
        }

        if ($self->endDate) {
            $self = $self->setEndDate($self->endDate->shiftTimezone($timezone));
        }

        return $self;
=======
        $this->tzName = $timezone;
        $this->timezone = $timezone;

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Returns the end is set, else calculated from start an recurrences.
     *
     * @param string|null $rounding Optional rounding 'floor', 'ceil', 'round' using the period interval.
     *
     * @return CarbonInterface
     */
    public function calculateEnd(string $rounding = null)
    {
        if ($end = $this->getEndDate($rounding)) {
            return $end;
        }

<<<<<<< HEAD
        if ($this->dateInterval->isEmpty()) {
            return $this->getStartDate($rounding);
        }

        $date = $this->getEndFromRecurrences() ?? $this->iterateUntilEnd();

        if ($date && $rounding) {
            $date = $date->avoidMutation()->round($this->getDateInterval(), $rounding);
        }

        return $date;
    }

    /**
     * @return CarbonInterface|null
     */
    private function getEndFromRecurrences()
    {
        if ($this->recurrences === null) {
            throw new UnreachableException(
                "Could not calculate period end without either explicit end or recurrences.\n".
                "If you're looking for a forever-period, use ->setRecurrences(INF)."
            );
        }

        if ($this->recurrences === INF) {
            $start = $this->getStartDate();

            return $start < $start->avoidMutation()->add($this->getDateInterval())
                ? CarbonImmutable::endOfTime()
                : CarbonImmutable::startOfTime();
        }

        if ($this->filters === [[static::RECURRENCES_FILTER, null]]) {
            return $this->getStartDate()->avoidMutation()->add(
                $this->getDateInterval()->times(
                    $this->recurrences - ($this->isStartExcluded() ? 0 : 1)
                )
            );
        }

        return null;
    }

    /**
     * @return CarbonInterface|null
     */
    private function iterateUntilEnd()
    {
        $attempts = 0;
        $date = null;

        foreach ($this as $date) {
            if (++$attempts > static::END_MAX_ATTEMPTS) {
                throw new UnreachableException(
                    'Could not calculate period end after iterating '.static::END_MAX_ATTEMPTS.' times.'
                );
            }
=======
        $dates = iterator_to_array($this);

        $date = end($dates);

        if ($date && $rounding) {
            $date = $date->copy()->round($this->getDateInterval(), $rounding);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $date;
    }

    /**
     * Returns true if the current period overlaps the given one (if 1 parameter passed)
     * or the period between 2 dates (if 2 parameters passed).
     *
     * @param CarbonPeriod|\DateTimeInterface|Carbon|CarbonImmutable|string $rangeOrRangeStart
     * @param \DateTimeInterface|Carbon|CarbonImmutable|string|null         $rangeEnd
     *
     * @return bool
     */
    public function overlaps($rangeOrRangeStart, $rangeEnd = null)
    {
        $range = $rangeEnd ? static::create($rangeOrRangeStart, $rangeEnd) : $rangeOrRangeStart;

        if (!($range instanceof self)) {
            $range = static::create($range);
        }

<<<<<<< HEAD
        [$start, $end] = $this->orderCouple($this->getStartDate(), $this->calculateEnd());
        [$rangeStart, $rangeEnd] = $this->orderCouple($range->getStartDate(), $range->calculateEnd());

        return $end > $rangeStart && $rangeEnd > $start;
=======
        return $this->calculateEnd() > $range->getStartDate() && $range->calculateEnd() > $this->getStartDate();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Execute a given function on each date of the period.
     *
     * @example
     * ```
     * Carbon::create('2020-11-29')->daysUntil('2020-12-24')->forEach(function (Carbon $date) {
     *   echo $date->diffInDays('2020-12-25')." days before Christmas!\n";
     * });
     * ```
     *
     * @param callable $callback
     */
    public function forEach(callable $callback)
    {
        foreach ($this as $date) {
            $callback($date);
        }
    }

    /**
     * Execute a given function on each date of the period and yield the result of this function.
     *
     * @example
     * ```
     * $period = Carbon::create('2020-11-29')->daysUntil('2020-12-24');
     * echo implode("\n", iterator_to_array($period->map(function (Carbon $date) {
     *   return $date->diffInDays('2020-12-25').' days before Christmas!';
     * })));
     * ```
     *
     * @param callable $callback
     *
     * @return \Generator
     */
    public function map(callable $callback)
    {
        foreach ($this as $date) {
            yield $callback($date);
        }
    }

    /**
     * Determines if the instance is equal to another.
<<<<<<< HEAD
     * Warning: if options differ, instances will never be equal.
=======
     * Warning: if options differ, instances wil never be equal.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param mixed $period
     *
     * @see equalTo()
     *
     * @return bool
     */
    public function eq($period): bool
    {
        return $this->equalTo($period);
    }

    /**
     * Determines if the instance is equal to another.
<<<<<<< HEAD
     * Warning: if options differ, instances will never be equal.
=======
     * Warning: if options differ, instances wil never be equal.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param mixed $period
     *
     * @return bool
     */
    public function equalTo($period): bool
    {
        if (!($period instanceof self)) {
            $period = self::make($period);
        }

        $end = $this->getEndDate();

        return $period !== null
            && $this->getDateInterval()->eq($period->getDateInterval())
            && $this->getStartDate()->eq($period->getStartDate())
            && ($end ? $end->eq($period->getEndDate()) : $this->getRecurrences() === $period->getRecurrences())
            && ($this->getOptions() & (~static::IMMUTABLE)) === ($period->getOptions() & (~static::IMMUTABLE));
    }

    /**
     * Determines if the instance is not equal to another.
<<<<<<< HEAD
     * Warning: if options differ, instances will never be equal.
=======
     * Warning: if options differ, instances wil never be equal.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param mixed $period
     *
     * @see notEqualTo()
     *
     * @return bool
     */
    public function ne($period): bool
    {
        return $this->notEqualTo($period);
    }

    /**
     * Determines if the instance is not equal to another.
<<<<<<< HEAD
     * Warning: if options differ, instances will never be equal.
=======
     * Warning: if options differ, instances wil never be equal.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param mixed $period
     *
     * @return bool
     */
    public function notEqualTo($period): bool
    {
        return !$this->eq($period);
    }

    /**
     * Determines if the start date is before an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsBefore($date = null): bool
    {
        return $this->getStartDate()->lessThan($this->resolveCarbon($date));
    }

    /**
     * Determines if the start date is before or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsBeforeOrAt($date = null): bool
    {
        return $this->getStartDate()->lessThanOrEqualTo($this->resolveCarbon($date));
    }

    /**
     * Determines if the start date is after an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAfter($date = null): bool
    {
        return $this->getStartDate()->greaterThan($this->resolveCarbon($date));
    }

    /**
     * Determines if the start date is after or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAfterOrAt($date = null): bool
    {
        return $this->getStartDate()->greaterThanOrEqualTo($this->resolveCarbon($date));
    }

    /**
     * Determines if the start date is the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function startsAt($date = null): bool
    {
        return $this->getStartDate()->equalTo($this->resolveCarbon($date));
    }

    /**
     * Determines if the end date is before an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsBefore($date = null): bool
    {
        return $this->calculateEnd()->lessThan($this->resolveCarbon($date));
    }

    /**
     * Determines if the end date is before or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsBeforeOrAt($date = null): bool
    {
        return $this->calculateEnd()->lessThanOrEqualTo($this->resolveCarbon($date));
    }

    /**
     * Determines if the end date is after an other given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAfter($date = null): bool
    {
        return $this->calculateEnd()->greaterThan($this->resolveCarbon($date));
    }

    /**
     * Determines if the end date is after or the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAfterOrAt($date = null): bool
    {
        return $this->calculateEnd()->greaterThanOrEqualTo($this->resolveCarbon($date));
    }

    /**
     * Determines if the end date is the same as a given date.
     * (Rather start/end are included by options is ignored.)
     *
     * @param mixed $date
     *
     * @return bool
     */
    public function endsAt($date = null): bool
    {
        return $this->calculateEnd()->equalTo($this->resolveCarbon($date));
    }

    /**
     * Return true if start date is now or later.
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isStarted(): bool
    {
        return $this->startsBeforeOrAt();
    }

    /**
     * Return true if end date is now or later.
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isEnded(): bool
    {
        return $this->endsBeforeOrAt();
    }

    /**
     * Return true if now is between start date (included) and end date (excluded).
     * (Rather start/end are included by options is ignored.)
     *
     * @return bool
     */
    public function isInProgress(): bool
    {
        return $this->isStarted() && !$this->isEnded();
    }

    /**
     * Round the current instance at the given unit with given precision if specified and the given function.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
<<<<<<< HEAD
     * @return static
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
        $self = $this->copyIfImmutable();
        $self = $self->setStartDate($self->getStartDate()->roundUnit($unit, $precision, $function));

        if ($self->endDate) {
            $self = $self->setEndDate($self->getEndDate()->roundUnit($unit, $precision, $function));
        }

        return $self->setDateInterval($self->getDateInterval()->roundUnit($unit, $precision, $function));
=======
     * @return $this
     */
    public function roundUnit($unit, $precision = 1, $function = 'round')
    {
        $this->setStartDate($this->getStartDate()->roundUnit($unit, $precision, $function));

        if ($this->endDate) {
            $this->setEndDate($this->getEndDate()->roundUnit($unit, $precision, $function));
        }

        $this->setDateInterval($this->getDateInterval()->roundUnit($unit, $precision, $function));

        return $this;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Truncate the current instance at the given unit with given precision if specified.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function floorUnit($unit, $precision = 1)
    {
        return $this->roundUnit($unit, $precision, 'floor');
    }

    /**
     * Ceil the current instance at the given unit with given precision if specified.
     *
     * @param string                              $unit
     * @param float|int|string|\DateInterval|null $precision
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function ceilUnit($unit, $precision = 1)
    {
        return $this->roundUnit($unit, $precision, 'ceil');
    }

    /**
     * Round the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     * @param string                              $function
     *
<<<<<<< HEAD
     * @return static
     */
    public function round($precision = null, $function = 'round')
    {
        return $this->roundWith(
            $precision ?? $this->getDateInterval()->setLocalTranslator(TranslatorImmutable::get('en'))->forHumans(),
            $function
        );
=======
     * @return $this
     */
    public function round($precision = null, $function = 'round')
    {
        return $this->roundWith($precision ?? (string) $this->getDateInterval(), $function);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Round the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function floor($precision = null)
    {
        return $this->round($precision, 'floor');
    }

    /**
     * Ceil the current instance second with given precision if specified (else period interval is used).
     *
     * @param float|int|string|\DateInterval|null $precision
     *
<<<<<<< HEAD
     * @return static
=======
     * @return $this
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function ceil($precision = null)
    {
        return $this->round($precision, 'ceil');
    }

    /**
     * Specify data which should be serialized to JSON.
     *
     * @link https://php.net/manual/en/jsonserializable.jsonserialize.php
     *
     * @return CarbonInterface[]
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function jsonSerialize()
    {
        return $this->toArray();
    }

    /**
     * Return true if the given date is between start and end.
     *
     * @param \Carbon\Carbon|\Carbon\CarbonPeriod|\Carbon\CarbonInterval|\DateInterval|\DatePeriod|\DateTimeInterface|string|null $date
     *
     * @return bool
     */
    public function contains($date = null): bool
    {
        $startMethod = 'startsBefore'.($this->isStartIncluded() ? 'OrAt' : '');
        $endMethod = 'endsAfter'.($this->isEndIncluded() ? 'OrAt' : '');

        return $this->$startMethod($date) && $this->$endMethod($date);
    }

    /**
     * Return true if the current period follows a given other period (with no overlap).
     * For instance, [2019-08-01 -> 2019-08-12] follows [2019-07-29 -> 2019-07-31]
     * Note than in this example, follows() would be false if 2019-08-01 or 2019-07-31 was excluded by options.
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function follows($period, ...$arguments): bool
    {
        $period = $this->resolveCarbonPeriod($period, ...$arguments);

        return $this->getIncludedStartDate()->equalTo($period->getIncludedEndDate()->add($period->getDateInterval()));
    }

    /**
     * Return true if the given other period follows the current one (with no overlap).
     * For instance, [2019-07-29 -> 2019-07-31] is followed by [2019-08-01 -> 2019-08-12]
     * Note than in this example, isFollowedBy() would be false if 2019-08-01 or 2019-07-31 was excluded by options.
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function isFollowedBy($period, ...$arguments): bool
    {
        $period = $this->resolveCarbonPeriod($period, ...$arguments);

        return $period->follows($this);
    }

    /**
     * Return true if the given period either follows or is followed by the current one.
     *
     * @see follows()
     * @see isFollowedBy()
     *
     * @param \Carbon\CarbonPeriod|\DatePeriod|string $period
     *
     * @return bool
     */
    public function isConsecutiveWith($period, ...$arguments): bool
    {
        return $this->follows($period, ...$arguments) || $this->isFollowedBy($period, ...$arguments);
    }

    /**
     * Update properties after removing built-in filters.
     *
     * @return void
     */
    protected function updateInternalState()
    {
        if (!$this->hasFilter(static::END_DATE_FILTER)) {
            $this->endDate = null;
        }

        if (!$this->hasFilter(static::RECURRENCES_FILTER)) {
            $this->recurrences = null;
        }
    }

    /**
     * Create a filter tuple from raw parameters.
     *
     * Will create an automatic filter callback for one of Carbon's is* methods.
     *
     * @param array $parameters
     *
     * @return array
     */
    protected function createFilterTuple(array $parameters)
    {
        $method = array_shift($parameters);

        if (!$this->isCarbonPredicateMethod($method)) {
            return [$method, array_shift($parameters)];
        }

        return [function ($date) use ($method, $parameters) {
<<<<<<< HEAD
            return ([$date, $method])(...$parameters);
=======
            return call_user_func_array([$date, $method], $parameters);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }, $method];
    }

    /**
     * Return whether given callable is a string pointing to one of Carbon's is* methods
     * and should be automatically converted to a filter callback.
     *
     * @param callable $callable
     *
     * @return bool
     */
    protected function isCarbonPredicateMethod($callable)
    {
<<<<<<< HEAD
        return \is_string($callable) && str_starts_with($callable, 'is') &&
            (method_exists($this->dateClass, $callable) || ([$this->dateClass, 'hasMacro'])($callable));
=======
        return is_string($callable) && substr($callable, 0, 2) === 'is' && (method_exists($this->dateClass, $callable) || call_user_func([$this->dateClass, 'hasMacro'], $callable));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Recurrences filter callback (limits number of recurrences).
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @param \Carbon\Carbon $current
     * @param int            $key
     *
     * @return bool|string
     */
    protected function filterRecurrences($current, $key)
    {
        if ($key < $this->recurrences) {
            return true;
        }

        return static::END_ITERATION;
    }

    /**
     * End date filter callback.
     *
     * @param \Carbon\Carbon $current
     *
     * @return bool|string
     */
    protected function filterEndDate($current)
    {
        if (!$this->isEndExcluded() && $current == $this->endDate) {
            return true;
        }

        if ($this->dateInterval->invert ? $current > $this->endDate : $current < $this->endDate) {
            return true;
        }

        return static::END_ITERATION;
    }

    /**
     * End iteration filter callback.
     *
     * @return string
     */
    protected function endIteration()
    {
        return static::END_ITERATION;
    }

    /**
     * Handle change of the parameters.
     */
    protected function handleChangedParameters()
    {
        if (($this->getOptions() & static::IMMUTABLE) && $this->dateClass === Carbon::class) {
<<<<<<< HEAD
            $this->dateClass = CarbonImmutable::class;
        } elseif (!($this->getOptions() & static::IMMUTABLE) && $this->dateClass === CarbonImmutable::class) {
            $this->dateClass = Carbon::class;
=======
            $this->setDateClass(CarbonImmutable::class);
        } elseif (!($this->getOptions() & static::IMMUTABLE) && $this->dateClass === CarbonImmutable::class) {
            $this->setDateClass(Carbon::class);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->validationResult = null;
    }

    /**
     * Validate current date and stop iteration when necessary.
     *
     * Returns true when current date is valid, false if it is not, or static::END_ITERATION
     * when iteration should be stopped.
     *
     * @return bool|string
     */
    protected function validateCurrentDate()
    {
        if ($this->current === null) {
            $this->rewind();
        }

        // Check after the first rewind to avoid repeating the initial validation.
<<<<<<< HEAD
        return $this->validationResult ?? ($this->validationResult = $this->checkFilters());
=======
        if ($this->validationResult !== null) {
            return $this->validationResult;
        }

        return $this->validationResult = $this->checkFilters();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Check whether current value and key pass all the filters.
     *
     * @return bool|string
     */
    protected function checkFilters()
    {
        $current = $this->prepareForReturn($this->current);

        foreach ($this->filters as $tuple) {
<<<<<<< HEAD
            $result = \call_user_func(
                $tuple[0],
                $current->avoidMutation(),
=======
            $result = call_user_func(
                $tuple[0],
                $current->copy(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $this->key,
                $this
            );

            if ($result === static::END_ITERATION) {
                return static::END_ITERATION;
            }

            if (!$result) {
                return false;
            }
        }

        return true;
    }

    /**
     * Prepare given date to be returned to the external logic.
     *
     * @param CarbonInterface $date
     *
     * @return CarbonInterface
     */
    protected function prepareForReturn(CarbonInterface $date)
    {
<<<<<<< HEAD
        $date = ([$this->dateClass, 'make'])($date);
=======
        $date = call_user_func([$this->dateClass, 'make'], $date);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->timezone) {
            $date = $date->setTimezone($this->timezone);
        }

        return $date;
    }

    /**
     * Keep incrementing the current date until a valid date is found or the iteration is ended.
     *
     * @throws RuntimeException
     *
     * @return void
     */
    protected function incrementCurrentDateUntilValid()
    {
        $attempts = 0;

        do {
            $this->current = $this->current->add($this->dateInterval);

            $this->validationResult = null;

            if (++$attempts > static::NEXT_MAX_ATTEMPTS) {
                throw new UnreachableException('Could not find next valid date.');
            }
        } while ($this->validateCurrentDate() === false);
    }

    /**
     * Call given macro.
     *
     * @param string $name
     * @param array  $parameters
     *
     * @return mixed
     */
    protected function callMacro($name, $parameters)
    {
        $macro = static::$macros[$name];

        if ($macro instanceof Closure) {
            $boundMacro = @$macro->bindTo($this, static::class) ?: @$macro->bindTo(null, static::class);

<<<<<<< HEAD
            return ($boundMacro ?: $macro)(...$parameters);
        }

        return $macro(...$parameters);
=======
            return call_user_func_array($boundMacro ?: $macro, $parameters);
        }

        return call_user_func_array($macro, $parameters);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return the Carbon instance passed through, a now instance in the same timezone
     * if null given or parse the input if string given.
     *
     * @param \Carbon\Carbon|\Carbon\CarbonPeriod|\Carbon\CarbonInterval|\DateInterval|\DatePeriod|\DateTimeInterface|string|null $date
     *
     * @return \Carbon\CarbonInterface
     */
    protected function resolveCarbon($date = null)
    {
        return $this->getStartDate()->nowWithSameTz()->carbonize($date);
    }

    /**
     * Resolve passed arguments or DatePeriod to a CarbonPeriod object.
     *
     * @param mixed $period
     * @param mixed ...$arguments
     *
     * @return static
     */
    protected function resolveCarbonPeriod($period, ...$arguments)
    {
        if ($period instanceof self) {
            return $period;
        }

        return $period instanceof DatePeriod
            ? static::instance($period)
            : static::create($period, ...$arguments);
    }
<<<<<<< HEAD

    private function orderCouple($first, $second): array
    {
        return $first > $second ? [$second, $first] : [$first, $second];
    }

    private function makeDateTime($value): ?DateTimeInterface
    {
        if ($value instanceof DateTimeInterface) {
            return $value;
        }

        if (\is_string($value)) {
            $value = trim($value);

            if (!preg_match('/^P[\dT]/', $value) &&
                !preg_match('/^R\d/', $value) &&
                preg_match('/[a-z\d]/i', $value)
            ) {
                $dateClass = $this->dateClass;

                return $dateClass::parse($value, $this->tzName);
            }
        }

        return null;
    }

    private function isInfiniteDate($date): bool
    {
        return $date instanceof CarbonInterface && ($date->isEndOfTime() || $date->isStartOfTime());
    }

    private function rawDate($date): ?DateTimeInterface
    {
        if ($date === false || $date === null) {
            return null;
        }

        if ($date instanceof CarbonInterface) {
            return $date->isMutable()
                ? $date->toDateTime()
                : $date->toDateTimeImmutable();
        }

        if (\in_array(\get_class($date), [DateTime::class, DateTimeImmutable::class], true)) {
            return $date;
        }

        $class = $date instanceof DateTime ? DateTime::class : DateTimeImmutable::class;

        return new $class($date->format('Y-m-d H:i:s.u'), $date->getTimezone());
    }

    private static function setDefaultParameters(array &$parameters, array $defaults): void
    {
        foreach ($defaults as [$index, $name, $value]) {
            if (!\array_key_exists($index, $parameters) && !\array_key_exists($name, $parameters)) {
                $parameters[$index] = $value;
            }
        }
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
