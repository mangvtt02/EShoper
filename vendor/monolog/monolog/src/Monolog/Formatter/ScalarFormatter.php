<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

/**
 * Formats data into an associative array of scalar values.
 * Objects and arrays will be JSON encoded.
 *
 * @author Andrew Lawson <adlawson@gmail.com>
 */
class ScalarFormatter extends NormalizerFormatter
{
    /**
<<<<<<< HEAD
     * {@inheritDoc}
     *
     * @phpstan-return array<string, scalar|null> $record
     */
    public function format(array $record): array
    {
        $result = [];
        foreach ($record as $key => $value) {
            $result[$key] = $this->normalizeValue($value);
        }

        return $result;
    }

    /**
     * @param  mixed                      $value
     * @return scalar|null
=======
     * {@inheritdoc}
     */
    public function format(array $record): array
    {
        foreach ($record as $key => $value) {
            $record[$key] = $this->normalizeValue($value);
        }

        return $record;
    }

    /**
     * @param  mixed $value
     * @return mixed
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function normalizeValue($value)
    {
        $normalized = $this->normalize($value);

<<<<<<< HEAD
        if (is_array($normalized)) {
=======
        if (is_array($normalized) || is_object($normalized)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $this->toJson($normalized, true);
        }

        return $normalized;
    }
}
