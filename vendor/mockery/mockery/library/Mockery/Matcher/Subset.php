<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Matcher;

<<<<<<< HEAD
use function array_replace_recursive;
use function implode;
use function is_array;

class Subset extends MatcherAbstract
{
    private $expected;

=======
class Subset extends MatcherAbstract
{
    private $expected;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $strict = true;

    /**
     * @param array $expected Expected subset of data
     * @param bool $strict Whether to run a strict or loose comparison
     */
    public function __construct(array $expected, $strict = true)
    {
        $this->expected = $expected;
        $this->strict = $strict;
    }

    /**
<<<<<<< HEAD
     * Return a string representation of this Matcher
     *
     * @return string
     */
    public function __toString()
    {
        return '<Subset' . $this->formatArray($this->expected) . '>';
    }

    /**
     * Check if the actual value matches the expected.
     *
     * @template TMixed
     *
     * @param TMixed $actual
     *
     * @return bool
     */
    public function match(&$actual)
    {
        if (! is_array($actual)) {
            return false;
        }

        if ($this->strict) {
            return $actual === array_replace_recursive($actual, $this->expected);
        }

        return $actual == array_replace_recursive($actual, $this->expected);
    }

    /**
     * Recursively format an array into the string representation for this matcher
     *
     * @return string
     */
    protected function formatArray(array $array)
    {
        $elements = [];
        foreach ($array as $k => $v) {
            $elements[] = $k . '=' . (is_array($v) ? $this->formatArray($v) : (string) $v);
        }

        return '[' . implode(', ', $elements) . ']';
=======
     * @param array $expected Expected subset of data
     *
     * @return Subset
     */
    public static function strict(array $expected)
    {
        return new static($expected, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @param array $expected Expected subset of data
     *
     * @return Subset
     */
    public static function loose(array $expected)
    {
        return new static($expected, false);
    }

    /**
<<<<<<< HEAD
     * @param array $expected Expected subset of data
     *
     * @return Subset
     */
    public static function strict(array $expected)
    {
        return new static($expected, true);
=======
     * Check if the actual value matches the expected.
     *
     * @param mixed $actual
     * @return bool
     */
    public function match(&$actual)
    {
        if (!is_array($actual)) {
            return false;
        }

        if ($this->strict) {
            return $actual === array_replace_recursive($actual, $this->expected);
        }

        return $actual == array_replace_recursive($actual, $this->expected);
    }

    /**
     * Return a string representation of this Matcher
     *
     * @return string
     */
    public function __toString()
    {
        $return = '<Subset[';
        $elements = array();
        foreach ($this->expected as $k=>$v) {
            $elements[] = $k . '=' . (string) $v;
        }
        $return .= implode(', ', $elements) . ']>';
        return $return;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
