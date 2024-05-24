<?php declare(strict_types=1);

namespace PhpParser\Lexer\TokenEmulator;

<<<<<<< HEAD
use PhpParser\Token;

abstract class KeywordEmulator extends TokenEmulator {
    abstract public function getKeywordString(): string;
    abstract public function getKeywordToken(): int;

    public function isEmulationNeeded(string $code): bool {
        return strpos(strtolower($code), $this->getKeywordString()) !== false;
    }

    /** @param Token[] $tokens */
    protected function isKeywordContext(array $tokens, int $pos): bool {
        $previousNonSpaceToken = $this->getPreviousNonSpaceToken($tokens, $pos);
        return $previousNonSpaceToken === null || $previousNonSpaceToken->id !== \T_OBJECT_OPERATOR;
    }

    public function emulate(string $code, array $tokens): array {
        $keywordString = $this->getKeywordString();
        foreach ($tokens as $i => $token) {
            if ($token->id === T_STRING && strtolower($token->text) === $keywordString
                    && $this->isKeywordContext($tokens, $i)) {
                $token->id = $this->getKeywordToken();
=======
abstract class KeywordEmulator extends TokenEmulator
{
    abstract function getKeywordString(): string;
    abstract function getKeywordToken(): int;

    public function isEmulationNeeded(string $code): bool
    {
        return strpos(strtolower($code), $this->getKeywordString()) !== false;
    }

    public function emulate(string $code, array $tokens): array
    {
        $keywordString = $this->getKeywordString();
        foreach ($tokens as $i => $token) {
            if ($token[0] === T_STRING && strtolower($token[1]) === $keywordString) {
                $previousNonSpaceToken = $this->getPreviousNonSpaceToken($tokens, $i);
                if ($previousNonSpaceToken !== null && $previousNonSpaceToken[0] === \T_OBJECT_OPERATOR) {
                    continue;
                }

                $tokens[$i][0] = $this->getKeywordToken();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $tokens;
    }

<<<<<<< HEAD
    /** @param Token[] $tokens */
    private function getPreviousNonSpaceToken(array $tokens, int $start): ?Token {
        for ($i = $start - 1; $i >= 0; --$i) {
            if ($tokens[$i]->id === T_WHITESPACE) {
=======
    /**
     * @param mixed[] $tokens
     * @return mixed[]|null
     */
    private function getPreviousNonSpaceToken(array $tokens, int $start)
    {
        for ($i = $start - 1; $i >= 0; --$i) {
            if ($tokens[$i][0] === T_WHITESPACE) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            return $tokens[$i];
        }

        return null;
    }

<<<<<<< HEAD
    public function reverseEmulate(string $code, array $tokens): array {
        $keywordToken = $this->getKeywordToken();
        foreach ($tokens as $token) {
            if ($token->id === $keywordToken) {
                $token->id = \T_STRING;
=======
    public function reverseEmulate(string $code, array $tokens): array
    {
        $keywordToken = $this->getKeywordToken();
        foreach ($tokens as $i => $token) {
            if ($token[0] === $keywordToken) {
                $tokens[$i][0] = \T_STRING;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $tokens;
    }
}
