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
 * A MongoDB tab completion Matcher.
 *
 * This matcher provides completion for Mongo collection names.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
class MongoDatabaseMatcher extends AbstractContextAwareMatcher
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
            // second token is the object operator
            \array_pop($tokens);
        }
        $objectToken = \array_pop($tokens);
<<<<<<< HEAD
        $objectName = \str_replace('$', '', $objectToken[1]);
        $object = $this->getVariable($objectName);
=======
        $objectName  = \str_replace('$', '', $objectToken[1]);
        $object      = $this->getVariable($objectName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (!$object instanceof \MongoDB) {
            return [];
        }

        return \array_filter(
            $object->getCollectionNames(),
            function ($var) use ($input) {
                return AbstractMatcher::startsWith($input, $var);
            }
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
            case self::tokenIs($token, self::T_OBJECT_OPERATOR):
            case self::tokenIs($prevToken, self::T_OBJECT_OPERATOR):
                return true;
        }

        return false;
    }
}
