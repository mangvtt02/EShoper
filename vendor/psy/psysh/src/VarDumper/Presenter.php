<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\VarDumper;

use Symfony\Component\Console\Formatter\OutputFormatter;
use Symfony\Component\VarDumper\Caster\Caster;
use Symfony\Component\VarDumper\Cloner\Stub;

/**
 * A Presenter service.
 */
class Presenter
{
    const VERBOSE = 1;

    private $cloner;
    private $dumper;
    private $exceptionsImportants = [
        "\0*\0message",
        "\0*\0code",
        "\0*\0file",
        "\0*\0line",
        "\0Exception\0previous",
    ];
    private $styles = [
        'num'       => 'number',
<<<<<<< HEAD
        'integer'   => 'integer',
        'float'     => 'float',
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        'const'     => 'const',
        'str'       => 'string',
        'cchr'      => 'default',
        'note'      => 'class',
        'ref'       => 'default',
        'public'    => 'public',
        'protected' => 'protected',
        'private'   => 'private',
        'meta'      => 'comment',
        'key'       => 'comment',
        'index'     => 'number',
    ];

    public function __construct(OutputFormatter $formatter, $forceArrayIndexes = false)
    {
        // Work around https://github.com/symfony/symfony/issues/23572
<<<<<<< HEAD
        $oldLocale = \setlocale(\LC_NUMERIC, 0);
        \setlocale(\LC_NUMERIC, 'C');
=======
        $oldLocale = \setlocale(LC_NUMERIC, 0);
        \setlocale(LC_NUMERIC, 'C');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->dumper = new Dumper($formatter, $forceArrayIndexes);
        $this->dumper->setStyles($this->styles);

        // Now put the locale back
<<<<<<< HEAD
        \setlocale(\LC_NUMERIC, $oldLocale);
=======
        \setlocale(LC_NUMERIC, $oldLocale);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->cloner = new Cloner();
        $this->cloner->addCasters(['*' => function ($obj, array $a, Stub $stub, $isNested, $filter = 0) {
            if ($filter || $isNested) {
<<<<<<< HEAD
                if ($obj instanceof \Throwable) {
=======
                if ($obj instanceof \Exception) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $a = Caster::filter($a, Caster::EXCLUDE_NOT_IMPORTANT | Caster::EXCLUDE_EMPTY, $this->exceptionsImportants);
                } else {
                    $a = Caster::filter($a, Caster::EXCLUDE_PROTECTED | Caster::EXCLUDE_PRIVATE);
                }
            }

            return $a;
        }]);
    }

    /**
     * Register casters.
     *
     * @see http://symfony.com/doc/current/components/var_dumper/advanced.html#casters
     *
     * @param callable[] $casters A map of casters
     */
    public function addCasters(array $casters)
    {
        $this->cloner->addCasters($casters);
    }

    /**
     * Present a reference to the value.
     *
     * @param mixed $value
<<<<<<< HEAD
     */
    public function presentRef($value): string
=======
     *
     * @return string
     */
    public function presentRef($value)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->present($value, 0);
    }

    /**
     * Present a full representation of the value.
     *
     * If $depth is 0, the value will be presented as a ref instead.
     *
     * @param mixed $value
     * @param int   $depth   (default: null)
     * @param int   $options One of Presenter constants
<<<<<<< HEAD
     */
    public function present($value, ?int $depth = null, int $options = 0): string
=======
     *
     * @return string
     */
    public function present($value, $depth = null, $options = 0)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $data = $this->cloner->cloneVar($value, !($options & self::VERBOSE) ? Caster::EXCLUDE_VERBOSE : 0);

        if (null !== $depth) {
            $data = $data->withMaxDepth($depth);
        }

        // Work around https://github.com/symfony/symfony/issues/23572
<<<<<<< HEAD
        $oldLocale = \setlocale(\LC_NUMERIC, 0);
        \setlocale(\LC_NUMERIC, 'C');
=======
        $oldLocale = \setlocale(LC_NUMERIC, 0);
        \setlocale(LC_NUMERIC, 'C');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $output = '';
        $this->dumper->dump($data, function ($line, $depth) use (&$output) {
            if ($depth >= 0) {
                if ('' !== $output) {
<<<<<<< HEAD
                    $output .= \PHP_EOL;
                }
                $output .= \str_repeat('  ', $depth).$line;
=======
                    $output .= PHP_EOL;
                }
                $output .= \str_repeat('  ', $depth) . $line;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        });

        // Now put the locale back
<<<<<<< HEAD
        \setlocale(\LC_NUMERIC, $oldLocale);
=======
        \setlocale(LC_NUMERIC, $oldLocale);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return OutputFormatter::escape($output);
    }
}
