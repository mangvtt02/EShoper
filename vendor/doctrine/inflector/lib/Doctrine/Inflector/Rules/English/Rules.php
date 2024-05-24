<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\English;

use Doctrine\Inflector\Rules\Patterns;
use Doctrine\Inflector\Rules\Ruleset;
use Doctrine\Inflector\Rules\Substitutions;
use Doctrine\Inflector\Rules\Transformations;

final class Rules
{
<<<<<<< HEAD
    public static function getSingularRuleset(): Ruleset
=======
    public static function getSingularRuleset() : Ruleset
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new Ruleset(
            new Transformations(...Inflectible::getSingular()),
            new Patterns(...Uninflected::getSingular()),
            (new Substitutions(...Inflectible::getIrregular()))->getFlippedSubstitutions()
        );
    }

<<<<<<< HEAD
    public static function getPluralRuleset(): Ruleset
=======
    public static function getPluralRuleset() : Ruleset
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new Ruleset(
            new Transformations(...Inflectible::getPlural()),
            new Patterns(...Uninflected::getPlural()),
            new Substitutions(...Inflectible::getIrregular())
        );
    }
}
