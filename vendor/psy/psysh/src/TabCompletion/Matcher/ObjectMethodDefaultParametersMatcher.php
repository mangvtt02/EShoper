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

class ObjectMethodDefaultParametersMatcher extends AbstractDefaultParametersMatcher
{
<<<<<<< HEAD
    public function getMatches(array $tokens, array $info = []): array
    {
        $openBracket = \array_pop($tokens);
        $functionName = \array_pop($tokens);
=======
    public function getMatches(array $tokens, array $info = [])
    {
        $openBracket    = \array_pop($tokens);
        $functionName   = \array_pop($tokens);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $methodOperator = \array_pop($tokens);

        $objectToken = \array_pop($tokens);
        if (!\is_array($objectToken)) {
            return [];
        }

        $objectName = \str_replace('$', '', $objectToken[1]);

        try {
            $object = $this->getVariable($objectName);
            $reflection = new \ReflectionObject($object);
        } catch (\InvalidArgumentException $e) {
            return [];
        } catch (\ReflectionException $e) {
            return [];
        }

        $methods = $reflection->getMethods();

        foreach ($methods as $method) {
            if ($method->getName() === $functionName[1]) {
                return $this->getDefaultParameterCompletion($method->getParameters());
            }
        }

        return [];
    }

<<<<<<< HEAD
    public function hasMatched(array $tokens): bool
=======
    public function hasMatched(array $tokens)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $openBracket = \array_pop($tokens);

        if ($openBracket !== '(') {
            return false;
        }

        $functionName = \array_pop($tokens);

        if (!self::tokenIs($functionName, self::T_STRING)) {
            return false;
        }

        $operator = \array_pop($tokens);

        if (!self::tokenIs($operator, self::T_OBJECT_OPERATOR)) {
            return false;
        }

        return true;
    }
}
