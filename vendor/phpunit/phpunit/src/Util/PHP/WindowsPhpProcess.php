<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\PHP;

<<<<<<< HEAD
use const PHP_MAJOR_VERSION;
use function tmpfile;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 *
 * @see https://bugs.php.net/bug.php?id=51800
 */
final class WindowsPhpProcess extends DefaultPhpProcess
{
<<<<<<< HEAD
    public function getCommand(array $settings, ?string $file = null): string
    {
        if (PHP_MAJOR_VERSION < 8) {
            return '"' . parent::getCommand($settings, $file) . '"';
        }

        return parent::getCommand($settings, $file);
=======
    public function getCommand(array $settings, string $file = null): string
    {
        return '"' . parent::getCommand($settings, $file) . '"';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @throws Exception
     */
    protected function getHandles(): array
    {
<<<<<<< HEAD
        if (false === $stdout_handle = tmpfile()) {
=======
        if (false === $stdout_handle = \tmpfile()) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new Exception(
                'A temporary file could not be created; verify that your TEMP environment variable is writable'
            );
        }

        return [
            1 => $stdout_handle,
        ];
    }

    protected function useTemporaryFile(): bool
    {
        return true;
    }
}
