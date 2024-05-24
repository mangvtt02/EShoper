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
use function array_keys;
use function array_shift;
use function count;
use function defined;
use function get_defined_constants;
use function get_included_files;
use function in_array;
use function ini_get_all;
use function is_array;
use function is_file;
use function is_scalar;
use function preg_match;
use function serialize;
use function sprintf;
use function strpos;
use function strtr;
use function substr;
use function var_export;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Closure;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class GlobalState
{
    /**
     * @var string[]
     */
    private const SUPER_GLOBAL_ARRAYS = [
        '_ENV',
        '_POST',
        '_GET',
        '_COOKIE',
        '_SERVER',
        '_FILES',
        '_REQUEST',
    ];

    /**
     * @throws Exception
     */
    public static function getIncludedFilesAsString(): string
    {
<<<<<<< HEAD
        return self::processIncludedFilesAsString(get_included_files());
=======
        return static::processIncludedFilesAsString(\get_included_files());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @param string[] $files
     *
     * @throws Exception
     */
    public static function processIncludedFilesAsString(array $files): string
    {
        $blacklist = new Blacklist;
        $prefix    = false;
        $result    = '';

<<<<<<< HEAD
        if (defined('__PHPUNIT_PHAR__')) {
            $prefix = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

        // Do not process bootstrap script
        array_shift($files);

        // If bootstrap script was a Composer bin proxy, skip the second entry as well
        if (substr(strtr($files[0], '\\', '/'), -24) === '/phpunit/phpunit/phpunit') {
            array_shift($files);
        }

        for ($i = count($files) - 1; $i >= 0; $i--) {
            $file = $files[$i];

            if (!empty($GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST']) &&
                in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST'], true)) {
                continue;
            }

            if ($prefix !== false && strpos($file, $prefix) === 0) {
=======
        if (\defined('__PHPUNIT_PHAR__')) {
            $prefix = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

        for ($i = \count($files) - 1; $i > 0; $i--) {
            $file = $files[$i];

            if (!empty($GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST']) &&
                \in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST'])) {
                continue;
            }

            if ($prefix !== false && \strpos($file, $prefix) === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            // Skip virtual file system protocols
<<<<<<< HEAD
            if (preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $file)) {
                continue;
            }

            if (!$blacklist->isBlacklisted($file) && is_file($file)) {
=======
            if (\preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $file)) {
                continue;
            }

            if (!$blacklist->isBlacklisted($file) && \is_file($file)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $result = 'require_once \'' . $file . "';\n" . $result;
            }
        }

        return $result;
    }

    public static function getIniSettingsAsString(): string
    {
        $result = '';

<<<<<<< HEAD
        foreach (ini_get_all(null, false) as $key => $value) {
            $result .= sprintf(
=======
        foreach (\ini_get_all(null, false) as $key => $value) {
            $result .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '@ini_set(%s, %s);' . "\n",
                self::exportVariable($key),
                self::exportVariable((string) $value)
            );
        }

        return $result;
    }

    public static function getConstantsAsString(): string
    {
<<<<<<< HEAD
        $constants = get_defined_constants(true);
=======
        $constants = \get_defined_constants(true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $result    = '';

        if (isset($constants['user'])) {
            foreach ($constants['user'] as $name => $value) {
<<<<<<< HEAD
                $result .= sprintf(
=======
                $result .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                    $name,
                    $name,
                    self::exportVariable($value)
                );
            }
        }

        return $result;
    }

    public static function getGlobalsAsString(): string
    {
        $result = '';

        foreach (self::SUPER_GLOBAL_ARRAYS as $superGlobalArray) {
<<<<<<< HEAD
            if (isset($GLOBALS[$superGlobalArray]) && is_array($GLOBALS[$superGlobalArray])) {
                foreach (array_keys($GLOBALS[$superGlobalArray]) as $key) {
=======
            if (isset($GLOBALS[$superGlobalArray]) && \is_array($GLOBALS[$superGlobalArray])) {
                foreach (\array_keys($GLOBALS[$superGlobalArray]) as $key) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    if ($GLOBALS[$superGlobalArray][$key] instanceof Closure) {
                        continue;
                    }

<<<<<<< HEAD
                    $result .= sprintf(
=======
                    $result .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        '$GLOBALS[\'%s\'][\'%s\'] = %s;' . "\n",
                        $superGlobalArray,
                        $key,
                        self::exportVariable($GLOBALS[$superGlobalArray][$key])
                    );
                }
            }
        }

        $blacklist   = self::SUPER_GLOBAL_ARRAYS;
        $blacklist[] = 'GLOBALS';

<<<<<<< HEAD
        foreach (array_keys($GLOBALS) as $key) {
            if (!$GLOBALS[$key] instanceof Closure && !in_array($key, $blacklist, true)) {
                $result .= sprintf(
=======
        foreach (\array_keys($GLOBALS) as $key) {
            if (!$GLOBALS[$key] instanceof Closure && !\in_array($key, $blacklist, true)) {
                $result .= \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    '$GLOBALS[\'%s\'] = %s;' . "\n",
                    $key,
                    self::exportVariable($GLOBALS[$key])
                );
            }
        }

        return $result;
    }

    private static function exportVariable($variable): string
    {
<<<<<<< HEAD
        if (is_scalar($variable) || $variable === null ||
            (is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' . var_export(serialize($variable), true) . ')';
=======
        if (\is_scalar($variable) || $variable === null ||
            (\is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return \var_export($variable, true);
        }

        return 'unserialize(' . \var_export(\serialize($variable), true) . ')';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private static function arrayOnlyContainsScalars(array $array): bool
    {
        $result = true;

        foreach ($array as $element) {
<<<<<<< HEAD
            if (is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!is_scalar($element) && $element !== null) {
=======
            if (\is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
            } elseif (!\is_scalar($element) && $element !== null) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $result = false;
            }

            if (!$result) {
                break;
            }
        }

        return $result;
    }
}
