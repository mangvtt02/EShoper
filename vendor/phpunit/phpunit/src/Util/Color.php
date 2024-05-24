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
use const DIRECTORY_SEPARATOR;
use function array_keys;
use function array_map;
use function array_values;
use function count;
use function explode;
use function implode;
use function min;
use function preg_replace;
use function preg_replace_callback;
use function sprintf;
use function strtr;
use function trim;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Color
{
    /**
     * @var array<string,string>
     */
    private const WHITESPACE_MAP = [
        ' '  => '·',
        "\t" => '⇥',
    ];

    /**
     * @var array<string,string>
     */
    private const WHITESPACE_EOL_MAP = [
        ' '  => '·',
        "\t" => '⇥',
        "\n" => '↵',
        "\r" => '⟵',
    ];

    /**
     * @var array<string,string>
     */
    private static $ansiCodes = [
        'reset'      => '0',
        'bold'       => '1',
        'dim'        => '2',
        'dim-reset'  => '22',
        'underlined' => '4',
        'fg-default' => '39',
        'fg-black'   => '30',
        'fg-red'     => '31',
        'fg-green'   => '32',
        'fg-yellow'  => '33',
        'fg-blue'    => '34',
        'fg-magenta' => '35',
        'fg-cyan'    => '36',
        'fg-white'   => '37',
        'bg-default' => '49',
        'bg-black'   => '40',
        'bg-red'     => '41',
        'bg-green'   => '42',
        'bg-yellow'  => '43',
        'bg-blue'    => '44',
        'bg-magenta' => '45',
        'bg-cyan'    => '46',
        'bg-white'   => '47',
    ];

    public static function colorize(string $color, string $buffer): string
    {
<<<<<<< HEAD
        if (trim($buffer) === '') {
            return $buffer;
        }

        $codes  = array_map('\trim', explode(',', $color));
=======
        if (\trim($buffer) === '') {
            return $buffer;
        }

        $codes  = \array_map('\trim', \explode(',', $color));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $styles = [];

        foreach ($codes as $code) {
            if (isset(self::$ansiCodes[$code])) {
                $styles[] = self::$ansiCodes[$code] ?? '';
            }
        }

        if (empty($styles)) {
            return $buffer;
        }

<<<<<<< HEAD
        return self::optimizeColor(sprintf("\x1b[%sm", implode(';', $styles)) . $buffer . "\x1b[0m");
=======
        return self::optimizeColor(\sprintf("\x1b[%sm", \implode(';', $styles)) . $buffer . "\x1b[0m");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public static function colorizePath(string $path, ?string $prevPath = null, bool $colorizeFilename = false): string
    {
        if ($prevPath === null) {
            $prevPath = '';
        }

<<<<<<< HEAD
        $path     = explode(DIRECTORY_SEPARATOR, $path);
        $prevPath = explode(DIRECTORY_SEPARATOR, $prevPath);

        for ($i = 0; $i < min(count($path), count($prevPath)); $i++) {
=======
        $path     = \explode(\DIRECTORY_SEPARATOR, $path);
        $prevPath = \explode(\DIRECTORY_SEPARATOR, $prevPath);

        for ($i = 0; $i < \min(\count($path), \count($prevPath)); $i++) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            if ($path[$i] == $prevPath[$i]) {
                $path[$i] = self::dim($path[$i]);
            }
        }

        if ($colorizeFilename) {
<<<<<<< HEAD
            $last        = count($path) - 1;
            $path[$last] = preg_replace_callback(
                '/([\-_\.]+|phpt$)/',
                static function ($matches)
                {
=======
            $last        = \count($path) - 1;
            $path[$last] = \preg_replace_callback(
                '/([\-_\.]+|phpt$)/',
                static function ($matches) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return self::dim($matches[0]);
                },
                $path[$last]
            );
        }

<<<<<<< HEAD
        return self::optimizeColor(implode(self::dim(DIRECTORY_SEPARATOR), $path));
=======
        return self::optimizeColor(\implode(self::dim(\DIRECTORY_SEPARATOR), $path));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public static function dim(string $buffer): string
    {
<<<<<<< HEAD
        if (trim($buffer) === '') {
            return $buffer;
        }

        return "\e[2m{$buffer}\e[22m";
=======
        if (\trim($buffer) === '') {
            return $buffer;
        }

        return "\e[2m$buffer\e[22m";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public static function visualizeWhitespace(string $buffer, bool $visualizeEOL = false): string
    {
        $replaceMap = $visualizeEOL ? self::WHITESPACE_EOL_MAP : self::WHITESPACE_MAP;

<<<<<<< HEAD
        return preg_replace_callback('/\s+/', static function ($matches) use ($replaceMap)
        {
            return self::dim(strtr($matches[0], $replaceMap));
=======
        return \preg_replace_callback('/\s+/', static function ($matches) use ($replaceMap) {
            return self::dim(\strtr($matches[0], $replaceMap));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }, $buffer);
    }

    private static function optimizeColor(string $buffer): string
    {
        $patterns = [
            "/\e\\[22m\e\\[2m/"                   => '',
            "/\e\\[([^m]*)m\e\\[([1-9][0-9;]*)m/" => "\e[$1;$2m",
            "/(\e\\[[^m]*m)+(\e\\[0m)/"           => '$2',
        ];

<<<<<<< HEAD
        return preg_replace(array_keys($patterns), array_values($patterns), $buffer);
=======
        return \preg_replace(\array_keys($patterns), \array_values($patterns), $buffer);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
