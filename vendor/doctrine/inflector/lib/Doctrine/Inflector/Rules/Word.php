<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules;

class Word
{
    /** @var string */
    private $word;

    public function __construct(string $word)
    {
        $this->word = $word;
    }

<<<<<<< HEAD
    public function getWord(): string
=======
    public function getWord() : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->word;
    }
}
