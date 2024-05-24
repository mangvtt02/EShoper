<?php

declare(strict_types=1);

namespace Doctrine\Inflector;

class NoopWordInflector implements WordInflector
{
<<<<<<< HEAD
    public function inflect(string $word): string
=======
    public function inflect(string $word) : string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $word;
    }
}
