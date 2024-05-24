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

namespace Psy\TabCompletion\Matcher;

/**
 * A class method tab completion Matcher.
 *
 * Given a namespace and class, this matcher provides completion for static
 * methods.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
class ClassMethodsMatcher extends AbstractMatcher
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getMatches(array $tokens, array $info = []): array
=======
    public function getMatches(array $tokens, array $info = [])
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $input = $this->getInput($tokens);

        $firstToken = \array_pop($tokens);
        if (self::tokenIs($firstToken, self::T_STRING)) {
            // second token is the nekudotayim operator
            \array_pop($tokens);
        }

        $class = $this->getNamespaceAndClass($tokens);

        try {
            $reflection = new \ReflectionClass($class);
        } catch (\ReflectionException $re) {
            return [];
        }

        if (self::needCompleteClass($tokens[1])) {
            $methods = $reflection->getMethods();
        } else {
            $methods = $reflection->getMethods(\ReflectionMethod::IS_STATIC);
        }

        $methods = \array_map(function (\ReflectionMethod $method) {
            return $method->getName();
        }, $methods);

        return \array_map(
            function ($name) use ($class) {
                $chunks = \explode('\\', $class);
                $className = \array_pop($chunks);

<<<<<<< HEAD
                return $className.'::'.$name;
=======
                return $className . '::' . $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            },
            \array_filter($methods, function ($method) use ($input) {
                return AbstractMatcher::startsWith($input, $method);
            })
        );
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasMatched(array $tokens): bool
    {
        $token = \array_pop($tokens);
=======
    public function hasMatched(array $tokens)
    {
        $token     = \array_pop($tokens);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $prevToken = \array_pop($tokens);

        switch (true) {
            case self::tokenIs($prevToken, self::T_DOUBLE_COLON) && self::tokenIs($token, self::T_STRING):
            case self::tokenIs($token, self::T_DOUBLE_COLON):
                return true;
        }

        return false;
    }
}
