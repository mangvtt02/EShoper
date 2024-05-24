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
 * A variable name tab completion Matcher.
 *
 * This matcher provides completion for variable names in the current Context.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
class VariablesMatcher extends AbstractContextAwareMatcher
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
        $var = \str_replace('$', '', $this->getInput($tokens));

        return \array_filter(\array_keys($this->getVariables()), function ($variable) use ($var) {
            return AbstractMatcher::startsWith($var, $variable);
        });
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function hasMatched(array $tokens): bool
=======
    public function hasMatched(array $tokens)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $token = \array_pop($tokens);

        switch (true) {
            case self::hasToken([self::T_OPEN_TAG, self::T_VARIABLE], $token):
            case \is_string($token) && $token === '$':
            case self::isOperator($token):
                return true;
        }

        return false;
    }
}
