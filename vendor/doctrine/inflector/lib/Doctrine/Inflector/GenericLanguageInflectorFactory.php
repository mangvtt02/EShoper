<?php

declare(strict_types=1);

namespace Doctrine\Inflector;

use Doctrine\Inflector\Rules\Ruleset;
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use function array_unshift;

abstract class GenericLanguageInflectorFactory implements LanguageInflectorFactory
{
    /** @var Ruleset[] */
    private $singularRulesets = [];

    /** @var Ruleset[] */
    private $pluralRulesets = [];

    final public function __construct()
    {
        $this->singularRulesets[] = $this->getSingularRuleset();
        $this->pluralRulesets[]   = $this->getPluralRuleset();
    }

<<<<<<< HEAD
    final public function build(): Inflector
=======
    final public function build() : Inflector
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new Inflector(
            new CachedWordInflector(new RulesetInflector(
                ...$this->singularRulesets
            )),
            new CachedWordInflector(new RulesetInflector(
                ...$this->pluralRulesets
            ))
        );
    }

<<<<<<< HEAD
    final public function withSingularRules(?Ruleset $singularRules, bool $reset = false): LanguageInflectorFactory
=======
    final public function withSingularRules(?Ruleset $singularRules, bool $reset = false) : LanguageInflectorFactory
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($reset) {
            $this->singularRulesets = [];
        }

        if ($singularRules instanceof Ruleset) {
            array_unshift($this->singularRulesets, $singularRules);
        }

        return $this;
    }

<<<<<<< HEAD
    final public function withPluralRules(?Ruleset $pluralRules, bool $reset = false): LanguageInflectorFactory
=======
    final public function withPluralRules(?Ruleset $pluralRules, bool $reset = false) : LanguageInflectorFactory
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($reset) {
            $this->pluralRulesets = [];
        }

        if ($pluralRules instanceof Ruleset) {
            array_unshift($this->pluralRulesets, $pluralRules);
        }

        return $this;
    }

<<<<<<< HEAD
    abstract protected function getSingularRuleset(): Ruleset;

    abstract protected function getPluralRuleset(): Ruleset;
=======
    abstract protected function getSingularRuleset() : Ruleset;

    abstract protected function getPluralRuleset() : Ruleset;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
