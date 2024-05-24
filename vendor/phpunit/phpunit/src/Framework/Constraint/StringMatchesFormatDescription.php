<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework\Constraint;

<<<<<<< HEAD
use const DIRECTORY_SEPARATOR;
use function explode;
use function implode;
use function preg_match;
use function preg_quote;
use function preg_replace;
use function strtr;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\Diff\Differ;

/**
 * ...
 */
final class StringMatchesFormatDescription extends RegularExpression
{
    /**
     * @var string
     */
    private $string;

    public function __construct(string $string)
    {
        parent::__construct(
            $this->createPatternFromFormat(
                $this->convertNewlines($string)
            )
        );

        $this->string = $string;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return parent::matches(
            $this->convertNewlines($other)
        );
    }

    protected function failureDescription($other): string
    {
        return 'string matches format description';
    }

    protected function additionalFailureDescription($other): string
    {
<<<<<<< HEAD
        $from = explode("\n", $this->string);
        $to   = explode("\n", $this->convertNewlines($other));
=======
        $from = \explode("\n", $this->string);
        $to   = \explode("\n", $this->convertNewlines($other));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($from as $index => $line) {
            if (isset($to[$index]) && $line !== $to[$index]) {
                $line = $this->createPatternFromFormat($line);

<<<<<<< HEAD
                if (preg_match($line, $to[$index]) > 0) {
=======
                if (\preg_match($line, $to[$index]) > 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $from[$index] = $to[$index];
                }
            }
        }

<<<<<<< HEAD
        $this->string = implode("\n", $from);
        $other        = implode("\n", $to);
=======
        $this->string = \implode("\n", $from);
        $other        = \implode("\n", $to);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return (new Differ("--- Expected\n+++ Actual\n"))->diff($this->string, $other);
    }

    private function createPatternFromFormat(string $string): string
    {
<<<<<<< HEAD
        $string = strtr(
            preg_quote($string, '/'),
            [
                '%%' => '%',
                '%e' => '\\' . DIRECTORY_SEPARATOR,
=======
        $string = \strtr(
            \preg_quote($string, '/'),
            [
                '%%' => '%',
                '%e' => '\\' . \DIRECTORY_SEPARATOR,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                '%s' => '[^\r\n]+',
                '%S' => '[^\r\n]*',
                '%a' => '.+',
                '%A' => '.*',
                '%w' => '\s*',
                '%i' => '[+-]?\d+',
                '%d' => '\d+',
                '%x' => '[0-9a-fA-F]+',
                '%f' => '[+-]?\.?\d+\.?\d*(?:[Ee][+-]?\d+)?',
                '%c' => '.',
            ]
        );

        return '/^' . $string . '$/s';
    }

    private function convertNewlines($text): string
    {
<<<<<<< HEAD
        return preg_replace('/\r\n/', "\n", $text);
=======
        return \preg_replace('/\r\n/', "\n", $text);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
