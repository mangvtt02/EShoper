<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util;

<<<<<<< HEAD
use function preg_match;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class RegularExpression
{
    /**
     * @return false|int
     */
<<<<<<< HEAD
    public static function safeMatch(string $pattern, string $subject)
    {
        return ErrorHandler::invokeIgnoringWarnings(
            static function () use ($pattern, $subject)
            {
                return preg_match($pattern, $subject);
=======
    public static function safeMatch(string $pattern, string $subject, ?array $matches = null, int $flags = 0, int $offset = 0)
    {
        return ErrorHandler::invokeIgnoringWarnings(
            static function () use ($pattern, $subject, $matches, $flags, $offset) {
                return \preg_match($pattern, $subject, $matches, $flags, $offset);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        );
    }
}
