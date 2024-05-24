<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner\Filter;

<<<<<<< HEAD
use function in_array;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class IncludeGroupFilterIterator extends GroupFilterIterator
{
    protected function doAccept(string $hash): bool
    {
<<<<<<< HEAD
        return in_array($hash, $this->groupTests, true);
=======
        return \in_array($hash, $this->groupTests, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
