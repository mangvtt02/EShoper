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

namespace Psy\Reflection;

/**
 * A fake ReflectionFunction but for language constructs.
 */
class ReflectionLanguageConstruct extends \ReflectionFunctionAbstract
{
    public $keyword;

    /**
     * Language construct parameter definitions.
     */
    private static $languageConstructs = [
        'isset' => [
            'var' => [],
            '...' => [
                'isOptional'   => true,
                'defaultValue' => null,
            ],
        ],

        'unset' => [
            'var' => [],
            '...' => [
                'isOptional'   => true,
                'defaultValue' => null,
            ],
        ],

        'empty' => [
            'var' => [],
        ],

        'echo' => [
            'arg1' => [],
            '...'  => [
                'isOptional'   => true,
                'defaultValue' => null,
            ],
        ],

        'print' => [
            'arg' => [],
        ],

        'die' => [
            'status' => [
                'isOptional'   => true,
                'defaultValue' => 0,
            ],
        ],

        'exit' => [
            'status' => [
                'isOptional'   => true,
                'defaultValue' => 0,
            ],
        ],
    ];

    /**
     * Construct a ReflectionLanguageConstruct object.
     *
     * @param string $keyword
     */
<<<<<<< HEAD
    public function __construct(string $keyword)
    {
        if (!self::isLanguageConstruct($keyword)) {
            throw new \InvalidArgumentException('Unknown language construct: '.$keyword);
=======
    public function __construct($keyword)
    {
        if (!self::isLanguageConstruct($keyword)) {
            throw new \InvalidArgumentException('Unknown language construct: ' . $keyword);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->keyword = $keyword;
    }

    /**
     * This can't (and shouldn't) do anything :).
     *
     * @throws \RuntimeException
     */
    public static function export($name)
    {
        throw new \RuntimeException('Not yet implemented because it\'s unclear what I should do here :)');
    }

    /**
     * Get language construct name.
<<<<<<< HEAD
     */
    public function getName(): string
=======
     *
     * @return string
     */
    public function getName()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->keyword;
    }

    /**
     * None of these return references.
<<<<<<< HEAD
     */
    public function returnsReference(): bool
=======
     *
     * @return bool
     */
    public function returnsReference()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return false;
    }

    /**
     * Get language construct params.
     *
     * @return array
     */
<<<<<<< HEAD
    public function getParameters(): array
    {
        $params = [];
        foreach (self::$languageConstructs[$this->keyword] as $parameter => $opts) {
            $params[] = new ReflectionLanguageConstructParameter($this->keyword, $parameter, $opts);
=======
    public function getParameters()
    {
        $params = [];
        foreach (self::$languageConstructs[$this->keyword] as $parameter => $opts) {
            \array_push($params, new ReflectionLanguageConstructParameter($this->keyword, $parameter, $opts));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $params;
    }

    /**
     * Gets the file name from a language construct.
     *
     * (Hint: it always returns false)
     *
<<<<<<< HEAD
     * @todo remove \ReturnTypeWillChange attribute after dropping support for PHP 7.x (when we can use union types)
     *
     * @return string|false (false)
     */
    #[\ReturnTypeWillChange]
=======
     * @return bool false
     */
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getFileName()
    {
        return false;
    }

    /**
     * To string.
<<<<<<< HEAD
     */
    public function __toString(): string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->getName();
    }

    /**
     * Check whether keyword is a (known) language construct.
     *
     * @param string $keyword
<<<<<<< HEAD
     */
    public static function isLanguageConstruct(string $keyword): bool
=======
     *
     * @return bool
     */
    public static function isLanguageConstruct($keyword)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return \array_key_exists($keyword, self::$languageConstructs);
    }
}
