<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject\Stub;

<<<<<<< HEAD
use function call_user_func_array;
use function get_class;
use function is_array;
use function is_object;
use function sprintf;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\MockObject\Invocation;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ReturnCallback implements Stub
{
    private $callback;

    public function __construct($callback)
    {
        $this->callback = $callback;
    }

    public function invoke(Invocation $invocation)
    {
<<<<<<< HEAD
        return call_user_func_array($this->callback, $invocation->getParameters());
=======
        return \call_user_func_array($this->callback, $invocation->getParameters());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function toString(): string
    {
<<<<<<< HEAD
        if (is_array($this->callback)) {
            if (is_object($this->callback[0])) {
                $class = get_class($this->callback[0]);
=======
        if (\is_array($this->callback)) {
            if (\is_object($this->callback[0])) {
                $class = \get_class($this->callback[0]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $type  = '->';
            } else {
                $class = $this->callback[0];
                $type  = '::';
            }

<<<<<<< HEAD
            return sprintf(
=======
            return \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'return result of user defined callback %s%s%s() with the ' .
                'passed arguments',
                $class,
                $type,
                $this->callback[1]
            );
        }

        return 'return result of user defined callback ' . $this->callback .
               ' with the passed arguments';
    }
}
