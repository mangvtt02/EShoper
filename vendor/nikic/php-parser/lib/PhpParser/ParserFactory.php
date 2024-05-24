<?php declare(strict_types=1);

namespace PhpParser;

<<<<<<< HEAD
use PhpParser\Parser\Php7;
use PhpParser\Parser\Php8;

class ParserFactory {
    /**
     * Create a parser targeting the given version on a best-effort basis. The parser will generally
     * accept code for the newest supported version, but will try to accommodate code that becomes
     * invalid in newer versions or changes in interpretation.
     */
    public function createForVersion(PhpVersion $version): Parser {
        if ($version->isHostVersion()) {
            $lexer = new Lexer();
        } else {
            $lexer = new Lexer\Emulative($version);
        }
        if ($version->id >= 80000) {
            return new Php8($lexer, $version);
        }
        return new Php7($lexer, $version);
    }

    /**
     * Create a parser targeting the newest version supported by this library. Code for older
     * versions will be accepted if there have been no relevant backwards-compatibility breaks in
     * PHP.
     */
    public function createForNewestSupportedVersion(): Parser {
        return $this->createForVersion(PhpVersion::getNewestSupported());
    }

    /**
     * Create a parser targeting the host PHP version, that is the PHP version we're currently
     * running on. This parser will not use any token emulation.
     */
    public function createForHostVersion(): Parser {
        return $this->createForVersion(PhpVersion::getHostVersion());
=======
class ParserFactory
{
    const PREFER_PHP7 = 1;
    const PREFER_PHP5 = 2;
    const ONLY_PHP7 = 3;
    const ONLY_PHP5 = 4;

    /**
     * Creates a Parser instance, according to the provided kind.
     *
     * @param int        $kind  One of ::PREFER_PHP7, ::PREFER_PHP5, ::ONLY_PHP7 or ::ONLY_PHP5
     * @param Lexer|null $lexer Lexer to use. Defaults to emulative lexer when not specified
     * @param array      $parserOptions Parser options. See ParserAbstract::__construct() argument
     *
     * @return Parser The parser instance
     */
    public function create(int $kind, Lexer $lexer = null, array $parserOptions = []) : Parser {
        if (null === $lexer) {
            $lexer = new Lexer\Emulative();
        }
        switch ($kind) {
            case self::PREFER_PHP7:
                return new Parser\Multiple([
                    new Parser\Php7($lexer, $parserOptions), new Parser\Php5($lexer, $parserOptions)
                ]);
            case self::PREFER_PHP5:
                return new Parser\Multiple([
                    new Parser\Php5($lexer, $parserOptions), new Parser\Php7($lexer, $parserOptions)
                ]);
            case self::ONLY_PHP7:
                return new Parser\Php7($lexer, $parserOptions);
            case self::ONLY_PHP5:
                return new Parser\Php5($lexer, $parserOptions);
            default:
                throw new \LogicException(
                    'Kind must be one of ::PREFER_PHP7, ::PREFER_PHP5, ::ONLY_PHP7 or ::ONLY_PHP5'
                );
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
