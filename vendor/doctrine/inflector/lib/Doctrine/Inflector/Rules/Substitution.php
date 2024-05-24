<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules;

final class Substitution
{
    /** @var Word */
    private $from;

    /** @var Word */
    private $to;

    public function __construct(Word $from, Word $to)
    {
        $this->from = $from;
        $this->to   = $to;
    }

<<<<<<< HEAD
    public function getFrom(): Word
=======
    public function getFrom() : Word
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->from;
    }

<<<<<<< HEAD
    public function getTo(): Word
=======
    public function getTo() : Word
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->to;
    }
}
