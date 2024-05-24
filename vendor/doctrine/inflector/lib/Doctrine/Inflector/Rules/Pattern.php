<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules;

use function preg_match;

final class Pattern
{
    /** @var string */
    private $pattern;

    /** @var string */
    private $regex;

    public function __construct(string $pattern)
    {
        $this->pattern = $pattern;

        if (isset($this->pattern[0]) && $this->pattern[0] === '/') {
            $this->regex = $this->pattern;
        } else {
            $this->regex = '/' . $this->pattern . '/i';
        }
    }

<<<<<<< HEAD
    public function getPattern(): string
=======
    public function getPattern() : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->pattern;
    }

<<<<<<< HEAD
    public function getRegex(): string
=======
    public function getRegex() : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->regex;
    }

<<<<<<< HEAD
    public function matches(string $word): bool
=======
    public function matches(string $word) : bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return preg_match($this->getRegex(), $word) === 1;
    }
}
