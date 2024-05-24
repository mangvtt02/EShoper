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

namespace Carbon\Traits;

use Carbon\Exceptions\InvalidFormatException;
use ReturnTypeWillChange;
use Throwable;
=======
namespace Carbon\Traits;

use Carbon\Exceptions\InvalidFormatException;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Trait Serialization.
 *
 * Serialization and JSON stuff.
 *
 * Depends on the following properties:
 *
 * @property int $year
 * @property int $month
 * @property int $daysInMonth
 * @property int $quarter
 *
 * Depends on the following methods:
 *
 * @method string|static locale(string $locale = null, string ...$fallbackLocales)
 * @method string        toJSON()
 */
trait Serialization
{
    use ObjectInitialisation;

    /**
     * The custom Carbon JSON serializer.
     *
     * @var callable|null
     */
    protected static $serializer;

    /**
     * List of key to use for dump/serialization.
     *
     * @var string[]
     */
    protected $dumpProperties = ['date', 'timezone_type', 'timezone'];

    /**
     * Locale to dump comes here before serialization.
     *
     * @var string|null
     */
<<<<<<< HEAD
    protected $dumpLocale;

    /**
     * Embed date properties to dump in a dedicated variables so it won't overlap native
     * DateTime ones.
     *
     * @var array|null
     */
    protected $dumpDateProperties;
=======
    protected $dumpLocale = null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Return a serialized string of the instance.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize($this);
    }

    /**
     * Create an instance from a serialized string.
     *
     * @param string $value
     *
     * @throws InvalidFormatException
     *
     * @return static
     */
    public static function fromSerialized($value)
    {
<<<<<<< HEAD
        $instance = @unserialize((string) $value);
=======
        $instance = @unserialize("$value");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (!$instance instanceof static) {
            throw new InvalidFormatException("Invalid serialized value: $value");
        }

        return $instance;
    }

    /**
     * The __set_state handler.
     *
     * @param string|array $dump
     *
     * @return static
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
    public static function __set_state($dump)
    {
        if (\is_string($dump)) {
=======
    public static function __set_state($dump)
    {
        if (is_string($dump)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return static::parse($dump);
        }

        /** @var \DateTimeInterface $date */
        $date = get_parent_class(static::class) && method_exists(parent::class, '__set_state')
            ? parent::__set_state((array) $dump)
            : (object) $dump;

        return static::instance($date);
    }

    /**
     * Returns the list of properties to dump on serialize() called on.
     *
<<<<<<< HEAD
     * Only used by PHP < 7.4.
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return array
     */
    public function __sleep()
    {
<<<<<<< HEAD
        $properties = $this->getSleepProperties();
=======
        $properties = $this->dumpProperties;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($this->localTranslator ?? null) {
            $properties[] = 'dumpLocale';
            $this->dumpLocale = $this->locale ?? null;
        }

        return $properties;
    }

    /**
<<<<<<< HEAD
     * Returns the values to dump on serialize() called on.
     *
     * Only used by PHP >= 7.4.
     *
     * @return array
     */
    public function __serialize(): array
    {
        // @codeCoverageIgnoreStart
        if (isset($this->timezone_type, $this->timezone, $this->date)) {
            return [
                'date' => $this->date ?? null,
                'timezone_type' => $this->timezone_type,
                'timezone' => $this->timezone ?? null,
            ];
        }
        // @codeCoverageIgnoreEnd

        $timezone = $this->getTimezone();
        $export = [
            'date' => $this->format('Y-m-d H:i:s.u'),
            'timezone_type' => $timezone->getType(),
            'timezone' => $timezone->getName(),
        ];

        // @codeCoverageIgnoreStart
        if (\extension_loaded('msgpack') && isset($this->constructedObjectId)) {
            $export['dumpDateProperties'] = [
                'date' => $this->format('Y-m-d H:i:s.u'),
                'timezone' => serialize($this->timezone ?? null),
            ];
        }
        // @codeCoverageIgnoreEnd

        if ($this->localTranslator ?? null) {
            $export['dumpLocale'] = $this->locale ?? null;
        }

        return $export;
    }

    /**
     * Set locale if specified on unserialize() called.
     *
     * Only used by PHP < 7.4.
     *
     * @return void
     */
    #[ReturnTypeWillChange]
    public function __wakeup()
    {
        if (parent::class && method_exists(parent::class, '__wakeup')) {
            // @codeCoverageIgnoreStart
            try {
                parent::__wakeup();
            } catch (Throwable $exception) {
                try {
                    // FatalError occurs when calling msgpack_unpack() in PHP 7.4 or later.
                    ['date' => $date, 'timezone' => $timezone] = $this->dumpDateProperties;
                    parent::__construct($date, unserialize($timezone));
                } catch (Throwable $ignoredException) {
                    throw $exception;
                }
            }
            // @codeCoverageIgnoreEnd
=======
     * Set locale if specified on unserialize() called.
     */
    public function __wakeup()
    {
        if (get_parent_class() && method_exists(parent::class, '__wakeup')) {
            parent::__wakeup();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->constructedObjectId = spl_object_hash($this);

        if (isset($this->dumpLocale)) {
            $this->locale($this->dumpLocale);
            $this->dumpLocale = null;
        }

        $this->cleanupDumpProperties();
    }

    /**
<<<<<<< HEAD
     * Set locale if specified on unserialize() called.
     *
     * Only used by PHP >= 7.4.
     *
     * @return void
     */
    public function __unserialize(array $data): void
    {
        // @codeCoverageIgnoreStart
        try {
            $this->__construct($data['date'] ?? null, $data['timezone'] ?? null);
        } catch (Throwable $exception) {
            if (!isset($data['dumpDateProperties']['date'], $data['dumpDateProperties']['timezone'])) {
                throw $exception;
            }

            try {
                // FatalError occurs when calling msgpack_unpack() in PHP 7.4 or later.
                ['date' => $date, 'timezone' => $timezone] = $data['dumpDateProperties'];
                $this->__construct($date, unserialize($timezone));
            } catch (Throwable $ignoredException) {
                throw $exception;
            }
        }
        // @codeCoverageIgnoreEnd

        if (isset($data['dumpLocale'])) {
            $this->locale($data['dumpLocale']);
        }
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Prepare the object for JSON serialization.
     *
     * @return array|string
     */
<<<<<<< HEAD
    #[ReturnTypeWillChange]
    public function jsonSerialize()
    {
        $serializer = $this->localSerializer ?? static::$serializer;

        if ($serializer) {
            return \is_string($serializer)
                ? $this->rawFormat($serializer)
                : $serializer($this);
=======
    public function jsonSerialize()
    {
        $serializer = $this->localSerializer ?? static::$serializer;
        if ($serializer) {
            return is_string($serializer)
                ? $this->rawFormat($serializer)
                : call_user_func($serializer, $this);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $this->toJSON();
    }

    /**
     * @deprecated To avoid conflict between different third-party libraries, static setters should not be used.
     *             You should rather transform Carbon object before the serialization.
     *
     * JSON serialize all Carbon instances using the given callback.
     *
     * @param callable $callback
     *
     * @return void
     */
    public static function serializeUsing($callback)
    {
        static::$serializer = $callback;
    }

    /**
     * Cleanup properties attached to the public scope of DateTime when a dump of the date is requested.
     * foreach ($date as $_) {}
     * serializer($date)
     * var_export($date)
     * get_object_vars($date)
     */
    public function cleanupDumpProperties()
    {
<<<<<<< HEAD
        // @codeCoverageIgnoreStart
        if (PHP_VERSION < 8.2) {
            foreach ($this->dumpProperties as $property) {
                if (isset($this->$property)) {
                    unset($this->$property);
                }
            }
        }
        // @codeCoverageIgnoreEnd

        return $this;
    }

    private function getSleepProperties(): array
    {
        $properties = $this->dumpProperties;

        // @codeCoverageIgnoreStart
        if (!\extension_loaded('msgpack')) {
            return $properties;
        }

        if (isset($this->constructedObjectId)) {
            $this->dumpDateProperties = [
                'date' => $this->format('Y-m-d H:i:s.u'),
                'timezone' => serialize($this->timezone ?? null),
            ];

            $properties[] = 'dumpDateProperties';
        }

        return $properties;
        // @codeCoverageIgnoreEnd
    }
=======
        foreach ($this->dumpProperties as $property) {
            if (isset($this->$property)) {
                unset($this->$property);
            }
        }

        return $this;
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
