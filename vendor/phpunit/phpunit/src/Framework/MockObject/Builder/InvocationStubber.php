<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\MockObject\Builder;

use PHPUnit\Framework\MockObject\Stub\Stub;
<<<<<<< HEAD
use Throwable;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

interface InvocationStubber
{
    public function will(Stub $stub): Identity;

    /** @return self */
<<<<<<< HEAD
    public function willReturn($value, ...$nextValues)/* : self */;
=======
    public function willReturn($value, ...$nextValues)/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param mixed $reference
     *
     * @return self
     */
<<<<<<< HEAD
    public function willReturnReference(&$reference)/* : self */;
=======
    public function willReturnReference(&$reference)/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param array<int, array<int, mixed>> $valueMap
     *
     * @return self
     */
<<<<<<< HEAD
    public function willReturnMap(array $valueMap)/* : self */;
=======
    public function willReturnMap(array $valueMap)/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param int $argumentIndex
     *
     * @return self
     */
<<<<<<< HEAD
    public function willReturnArgument($argumentIndex)/* : self */;
=======
    public function willReturnArgument($argumentIndex)/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param callable $callback
     *
     * @return self
     */
<<<<<<< HEAD
    public function willReturnCallback($callback)/* : self */;

    /** @return self */
    public function willReturnSelf()/* : self */;
=======
    public function willReturnCallback($callback)/*: self */;

    /** @return self */
    public function willReturnSelf()/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @param mixed $values
     *
     * @return self
     */
<<<<<<< HEAD
    public function willReturnOnConsecutiveCalls(...$values)/* : self */;

    /** @return self */
    public function willThrowException(Throwable $exception)/* : self */;
=======
    public function willReturnOnConsecutiveCalls(...$values)/*: self */;

    /** @return self */
    public function willThrowException(\Throwable $exception)/*: self */;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
