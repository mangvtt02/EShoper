<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Input;

/**
 * A simple class used internally by PsySH to represent silent input.
 *
 * Silent input is generally used for non-user-generated code, such as the
 * rewritten user code run by sudo command. Silent input isn't echoed before
 * evaluating, and it's not added to the readline history.
 */
class SilentInput
{
    private $inputString;

    /**
     * Constructor.
     *
     * @param string $inputString
     */
<<<<<<< HEAD
    public function __construct(string $inputString)
=======
    public function __construct($inputString)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->inputString = $inputString;
    }

    /**
     * To. String.
<<<<<<< HEAD
     */
    public function __toString(): string
=======
     *
     * @return string
     */
    public function __toString()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->inputString;
    }
}
