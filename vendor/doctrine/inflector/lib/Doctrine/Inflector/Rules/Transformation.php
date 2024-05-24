<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules;

use Doctrine\Inflector\WordInflector;
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use function preg_replace;

final class Transformation implements WordInflector
{
    /** @var Pattern */
    private $pattern;

    /** @var string */
    private $replacement;

    public function __construct(Pattern $pattern, string $replacement)
    {
        $this->pattern     = $pattern;
        $this->replacement = $replacement;
    }

<<<<<<< HEAD
    public function getPattern(): Pattern
=======
    public function getPattern() : Pattern
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->pattern;
    }

<<<<<<< HEAD
    public function getReplacement(): string
=======
    public function getReplacement() : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->replacement;
    }

<<<<<<< HEAD
    public function inflect(string $word): string
=======
    public function inflect(string $word) : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return (string) preg_replace($this->pattern->getRegex(), $this->replacement, $word);
    }
}
