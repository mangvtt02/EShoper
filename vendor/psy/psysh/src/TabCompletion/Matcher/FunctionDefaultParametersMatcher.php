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

class FunctionDefaultParametersMatcher extends AbstractDefaultParametersMatcher
{
<<<<<<< HEAD
    public function getMatches(array $tokens, array $info = []): array
=======
    public function getMatches(array $tokens, array $info = [])
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        \array_pop($tokens); // open bracket

        $functionName = \array_pop($tokens);

        try {
            $reflection = new \ReflectionFunction($functionName[1]);
        } catch (\ReflectionException $e) {
            return [];
        }

        $parameters = $reflection->getParameters();

        return $this->getDefaultParameterCompletion($parameters);
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

        if (!\function_exists($functionName[1])) {
            return false;
        }

        return true;
    }
}
