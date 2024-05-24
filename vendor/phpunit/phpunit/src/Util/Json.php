<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use const JSON_PRETTY_PRINT;
use const JSON_UNESCAPED_SLASHES;
use const JSON_UNESCAPED_UNICODE;
use function count;
use function is_array;
use function is_object;
use function json_decode;
use function json_encode;
use function json_last_error;
use function ksort;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Json
{
    /**
<<<<<<< HEAD
     * Prettify json string.
     *
     * @throws Exception
     */
    public static function prettify(string $json): string
    {
        $decodedJson = json_decode($json, false);

        if (json_last_error()) {
=======
     * Prettify json string
     *
     * @throws \PHPUnit\Framework\Exception
     */
    public static function prettify(string $json): string
    {
        $decodedJson = \json_decode($json, false);

        if (\json_last_error()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new Exception(
                'Cannot prettify invalid json'
            );
        }

<<<<<<< HEAD
        return json_encode($decodedJson, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE);
    }

    /**
     * To allow comparison of JSON strings, first process them into a consistent
     * format so that they can be compared as strings.
     *
     * @return array ($error, $canonicalized_json)  The $error parameter is used
     *               to indicate an error decoding the json. This is used to avoid ambiguity
     *               with JSON strings consisting entirely of 'null' or 'false'.
     */
    public static function canonicalize(string $json): array
    {
        $decodedJson = json_decode($json);

        if (json_last_error()) {
=======
        return \json_encode($decodedJson, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES | \JSON_UNESCAPED_UNICODE);
    }

    /*
     * To allow comparison of JSON strings, first process them into a consistent
     * format so that they can be compared as strings.
     * @return array ($error, $canonicalized_json)  The $error parameter is used
     * to indicate an error decoding the json.  This is used to avoid ambiguity
     * with JSON strings consisting entirely of 'null' or 'false'.
     */
    public static function canonicalize(string $json): array
    {
        $decodedJson = \json_decode($json);

        if (\json_last_error()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return [true, null];
        }

        self::recursiveSort($decodedJson);

<<<<<<< HEAD
        $reencodedJson = json_encode($decodedJson);
=======
        $reencodedJson = \json_encode($decodedJson);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return [false, $reencodedJson];
    }

<<<<<<< HEAD
    /**
     * JSON object keys are unordered while PHP array keys are ordered.
     *
=======
    /*
     * JSON object keys are unordered while PHP array keys are ordered.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * Sort all array keys to ensure both the expected and actual values have
     * their keys in the same order.
     */
    private static function recursiveSort(&$json): void
    {
<<<<<<< HEAD
        if (!is_array($json)) {
=======
        if (!\is_array($json)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // If the object is not empty, change it to an associative array
            // so we can sort the keys (and we will still re-encode it
            // correctly, since PHP encodes associative arrays as JSON objects.)
            // But EMPTY objects MUST remain empty objects. (Otherwise we will
            // re-encode it as a JSON array rather than a JSON object.)
            // See #2919.
<<<<<<< HEAD
            if (is_object($json) && count((array) $json) > 0) {
=======
            if (\is_object($json) && \count((array) $json) > 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $json = (array) $json;
            } else {
                return;
            }
        }

<<<<<<< HEAD
        ksort($json);
=======
        \ksort($json);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($json as $key => &$value) {
            self::recursiveSort($value);
        }
    }
}
