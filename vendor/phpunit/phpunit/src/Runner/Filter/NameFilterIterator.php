<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

<<<<<<< HEAD
use function end;
use function implode;
use function preg_match;
use function sprintf;
use function str_replace;
use Exception;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Util\RegularExpression;
use PHPUnit\Util\Test;
use RecursiveFilterIterator;
use RecursiveIterator;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
=======
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\WarningTestCase;
use PHPUnit\Util\RegularExpression;
use RecursiveFilterIterator;
use RecursiveIterator;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class NameFilterIterator extends RecursiveFilterIterator
{
    /**
     * @var string
     */
    private $filter;

    /**
     * @var int
     */
    private $filterMin;

    /**
     * @var int
     */
    private $filterMax;

    /**
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(RecursiveIterator $iterator, string $filter)
    {
        parent::__construct($iterator);

        $this->setFilter($filter);
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function accept(): bool
    {
        $test = $this->getInnerIterator()->current();

        if ($test instanceof TestSuite) {
            return true;
        }

<<<<<<< HEAD
        $tmp = Test::describe($test);
=======
        $tmp = \PHPUnit\Util\Test::describe($test);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($test instanceof WarningTestCase) {
            $name = $test->getMessage();
        } elseif ($tmp[0] !== '') {
<<<<<<< HEAD
            $name = implode('::', $tmp);
=======
            $name = \implode('::', $tmp);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $name = $tmp[1];
        }

<<<<<<< HEAD
        $accepted = @preg_match($this->filter, $name, $matches);

        if ($accepted && isset($this->filterMax)) {
            $set      = end($matches);
=======
        $accepted = @\preg_match($this->filter, $name, $matches);

        if ($accepted && isset($this->filterMax)) {
            $set      = \end($matches);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $accepted = $set >= $this->filterMin && $set <= $this->filterMax;
        }

        return (bool) $accepted;
    }

    /**
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function setFilter(string $filter): void
    {
        if (RegularExpression::safeMatch($filter, '') === false) {
            // Handles:
            //  * testAssertEqualsSucceeds#4
            //  * testAssertEqualsSucceeds#4-8
<<<<<<< HEAD
            if (preg_match('/^(.*?)#(\d+)(?:-(\d+))?$/', $filter, $matches)) {
                if (isset($matches[3]) && $matches[2] < $matches[3]) {
                    $filter = sprintf(
=======
            if (\preg_match('/^(.*?)#(\d+)(?:-(\d+))?$/', $filter, $matches)) {
                if (isset($matches[3]) && $matches[2] < $matches[3]) {
                    $filter = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        '%s.*with data set #(\d+)$',
                        $matches[1]
                    );

                    $this->filterMin = (int) $matches[2];
                    $this->filterMax = (int) $matches[3];
                } else {
<<<<<<< HEAD
                    $filter = sprintf(
=======
                    $filter = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        '%s.*with data set #%s$',
                        $matches[1],
                        $matches[2]
                    );
                }
            } // Handles:
            //  * testDetermineJsonError@JSON_ERROR_NONE
            //  * testDetermineJsonError@JSON.*
<<<<<<< HEAD
            elseif (preg_match('/^(.*?)@(.+)$/', $filter, $matches)) {
                $filter = sprintf(
=======
            elseif (\preg_match('/^(.*?)@(.+)$/', $filter, $matches)) {
                $filter = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    '%s.*with data set "%s"$',
                    $matches[1],
                    $matches[2]
                );
            }

            // Escape delimiters in regular expression. Do NOT use preg_quote,
            // to keep magic characters.
<<<<<<< HEAD
            $filter = sprintf(
                '/%s/i',
                str_replace(
                    '/',
                    '\\/',
                    $filter
                )
            );
=======
            $filter = \sprintf('/%s/i', \str_replace(
                '/',
                '\\/',
                $filter
            ));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->filter = $filter;
    }
}
