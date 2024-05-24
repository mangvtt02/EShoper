<?php declare(strict_types=1);

namespace PhpParser\Lexer\TokenEmulator;

<<<<<<< HEAD
use PhpParser\PhpVersion;
use PhpParser\Token;

/** @internal */
abstract class TokenEmulator {
    abstract public function getPhpVersion(): PhpVersion;
=======
/** @internal */
abstract class TokenEmulator
{
    abstract public function getPhpVersion(): string;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    abstract public function isEmulationNeeded(string $code): bool;

    /**
<<<<<<< HEAD
     * @param Token[] $tokens Original tokens
     * @return Token[] Modified Tokens
=======
     * @return array Modified Tokens
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    abstract public function emulate(string $code, array $tokens): array;

    /**
<<<<<<< HEAD
     * @param Token[] $tokens Original tokens
     * @return Token[] Modified Tokens
     */
    abstract public function reverseEmulate(string $code, array $tokens): array;

    /** @param array{int, string, string}[] $patches */
=======
     * @return array Modified Tokens
     */
    abstract public function reverseEmulate(string $code, array $tokens): array;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function preprocessCode(string $code, array &$patches): string {
        return $code;
    }
}
