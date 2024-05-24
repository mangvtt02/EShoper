<?php

/*
 * Copyright 2012 Johannes M. Schmitt <schmittjoh@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PhpOption;

use ArrayIterator;

/**
 * @template T
 *
 * @extends Option<T>
 */
final class Some extends Option
{
    /** @var T */
    private $value;

    /**
     * @param T $value
     */
    public function __construct($value)
    {
        $this->value = $value;
    }

    /**
     * @template U
     *
     * @param U $value
     *
     * @return Some<U>
     */
<<<<<<< HEAD
    public static function create($value): self
=======
    public static function create($value)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new self($value);
    }

<<<<<<< HEAD
    public function isDefined(): bool
=======
    public function isDefined()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return true;
    }

<<<<<<< HEAD
    public function isEmpty(): bool
=======
    public function isEmpty()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return false;
    }

    public function get()
    {
        return $this->value;
    }

    public function getOrElse($default)
    {
        return $this->value;
    }

    public function getOrCall($callable)
    {
        return $this->value;
    }

    public function getOrThrow(\Exception $ex)
    {
        return $this->value;
    }

    public function orElse(Option $else)
    {
        return $this;
    }

    public function ifDefined($callable)
    {
        $this->forAll($callable);
    }

    public function forAll($callable)
    {
        $callable($this->value);

        return $this;
    }

    public function map($callable)
    {
        return new self($callable($this->value));
    }

    public function flatMap($callable)
    {
        /** @var mixed */
        $rs = $callable($this->value);
        if (!$rs instanceof Option) {
            throw new \RuntimeException('Callables passed to flatMap() must return an Option. Maybe you should use map() instead?');
        }

        return $rs;
    }

    public function filter($callable)
    {
        if (true === $callable($this->value)) {
            return $this;
        }

        return None::create();
    }

    public function filterNot($callable)
    {
        if (false === $callable($this->value)) {
            return $this;
        }

        return None::create();
    }

    public function select($value)
    {
        if ($this->value === $value) {
            return $this;
        }

        return None::create();
    }

    public function reject($value)
    {
        if ($this->value === $value) {
            return None::create();
        }

        return $this;
    }

<<<<<<< HEAD
    /**
     * @return ArrayIterator<int, T>
     */
    public function getIterator(): ArrayIterator
=======
    public function getIterator()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new ArrayIterator([$this->value]);
    }

    public function foldLeft($initialValue, $callable)
    {
        return $callable($initialValue, $this->value);
    }

    public function foldRight($initialValue, $callable)
    {
        return $callable($this->value, $initialValue);
    }
}
