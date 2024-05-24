<?php

declare(strict_types=1);

namespace Doctrine\Inflector;

use Doctrine\Inflector\Rules\Ruleset;
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use function array_merge;

/**
 * Inflects based on multiple rulesets.
 *
 * Rules:
 * - If the word matches any uninflected word pattern, it is not inflected
 * - The first ruleset that returns a different value for an irregular word wins
 * - The first ruleset that returns a different value for a regular word wins
 * - If none of the above match, the word is left as-is
 */
class RulesetInflector implements WordInflector
{
    /** @var Ruleset[] */
    private $rulesets;

    public function __construct(Ruleset $ruleset, Ruleset ...$rulesets)
    {
        $this->rulesets = array_merge([$ruleset], $rulesets);
    }

<<<<<<< HEAD
    public function inflect(string $word): string
=======
    public function inflect(string $word) : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($word === '') {
            return '';
        }

        foreach ($this->rulesets as $ruleset) {
            if ($ruleset->getUninflected()->matches($word)) {
                return $word;
            }

            $inflected = $ruleset->getIrregular()->inflect($word);

            if ($inflected !== $word) {
                return $inflected;
            }

            $inflected = $ruleset->getRegular()->inflect($word);

            if ($inflected !== $word) {
                return $inflected;
            }
        }

        return $word;
    }
}
