<?php

<<<<<<< HEAD
/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
 */

namespace Mockery\Exception;

use Throwable;

class BadMethodCallException extends \BadMethodCallException implements MockeryExceptionInterface
=======
namespace Mockery\Exception;

class BadMethodCallException extends \BadMethodCallException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
{
    private $dismissed = false;

    public function dismiss()
    {
        $this->dismissed = true;
<<<<<<< HEAD
        // we sometimes stack them
        $previous = $this->getPrevious();
        if (! $previous instanceof self) {
            return;
        }

        $previous->dismiss();
=======

        // we sometimes stack them
        if ($this->getPrevious() && $this->getPrevious() instanceof BadMethodCallException) {
            $this->getPrevious()->dismiss();
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function dismissed()
    {
        return $this->dismissed;
    }
}
