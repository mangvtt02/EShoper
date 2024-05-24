<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\French;

use Doctrine\Inflector\GenericLanguageInflectorFactory;
use Doctrine\Inflector\Rules\Ruleset;

final class InflectorFactory extends GenericLanguageInflectorFactory
{
<<<<<<< HEAD
    protected function getSingularRuleset(): Ruleset
=======
    protected function getSingularRuleset() : Ruleset
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return Rules::getSingularRuleset();
    }

<<<<<<< HEAD
    protected function getPluralRuleset(): Ruleset
=======
    protected function getPluralRuleset() : Ruleset
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return Rules::getPluralRuleset();
    }
}
