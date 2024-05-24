<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy;

use PhpParser\NodeTraverser;
use PhpParser\Parser;
use PhpParser\PrettyPrinter\Standard as Printer;
use Psy\CodeCleaner\AbstractClassPass;
use Psy\CodeCleaner\AssignThisVariablePass;
use Psy\CodeCleaner\CalledClassPass;
use Psy\CodeCleaner\CallTimePassByReferencePass;
<<<<<<< HEAD
use Psy\CodeCleaner\CodeCleanerPass;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\CodeCleaner\EmptyArrayDimFetchPass;
use Psy\CodeCleaner\ExitPass;
use Psy\CodeCleaner\FinalClassPass;
use Psy\CodeCleaner\FunctionContextPass;
use Psy\CodeCleaner\FunctionReturnInWriteContextPass;
use Psy\CodeCleaner\ImplicitReturnPass;
<<<<<<< HEAD
use Psy\CodeCleaner\IssetPass;
=======
use Psy\CodeCleaner\InstanceOfPass;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\CodeCleaner\LabelContextPass;
use Psy\CodeCleaner\LeavePsyshAlonePass;
use Psy\CodeCleaner\ListPass;
use Psy\CodeCleaner\LoopContextPass;
use Psy\CodeCleaner\MagicConstantsPass;
use Psy\CodeCleaner\NamespacePass;
use Psy\CodeCleaner\PassableByReferencePass;
use Psy\CodeCleaner\RequirePass;
use Psy\CodeCleaner\ReturnTypePass;
use Psy\CodeCleaner\StrictTypesPass;
use Psy\CodeCleaner\UseStatementPass;
use Psy\CodeCleaner\ValidClassNamePass;
<<<<<<< HEAD
=======
use Psy\CodeCleaner\ValidConstantPass;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Psy\CodeCleaner\ValidConstructorPass;
use Psy\CodeCleaner\ValidFunctionNamePass;
use Psy\Exception\ParseErrorException;

/**
 * A service to clean up user input, detect parse errors before they happen,
 * and generally work around issues with the PHP code evaluation experience.
 */
class CodeCleaner
{
<<<<<<< HEAD
    private $yolo = false;
    private $strictTypes = false;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    private $parser;
    private $printer;
    private $traverser;
    private $namespace;

    /**
     * CodeCleaner constructor.
     *
<<<<<<< HEAD
     * @param Parser|null        $parser      A PhpParser Parser instance. One will be created if not explicitly supplied
     * @param Printer|null       $printer     A PhpParser Printer instance. One will be created if not explicitly supplied
     * @param NodeTraverser|null $traverser   A PhpParser NodeTraverser instance. One will be created if not explicitly supplied
     * @param bool               $yolo        run without input validation
     * @param bool               $strictTypes enforce strict types by default
     */
    public function __construct(?Parser $parser = null, ?Printer $printer = null, ?NodeTraverser $traverser = null, bool $yolo = false, bool $strictTypes = false)
    {
        $this->yolo = $yolo;
        $this->strictTypes = $strictTypes;

        $this->parser = $parser ?? (new ParserFactory())->createParser();
        $this->printer = $printer ?: new Printer();
=======
     * @param Parser|null        $parser    A PhpParser Parser instance. One will be created if not explicitly supplied
     * @param Printer|null       $printer   A PhpParser Printer instance. One will be created if not explicitly supplied
     * @param NodeTraverser|null $traverser A PhpParser NodeTraverser instance. One will be created if not explicitly supplied
     */
    public function __construct(Parser $parser = null, Printer $printer = null, NodeTraverser $traverser = null)
    {
        if ($parser === null) {
            $parserFactory = new ParserFactory();
            $parser        = $parserFactory->createParser();
        }

        $this->parser    = $parser;
        $this->printer   = $printer ?: new Printer();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->traverser = $traverser ?: new NodeTraverser();

        foreach ($this->getDefaultPasses() as $pass) {
            $this->traverser->addVisitor($pass);
        }
    }

    /**
<<<<<<< HEAD
     * Check whether this CodeCleaner is in YOLO mode.
     */
    public function yolo(): bool
    {
        return $this->yolo;
    }

    /**
     * Get default CodeCleaner passes.
     *
     * @return CodeCleanerPass[]
     */
    private function getDefaultPasses(): array
    {
        if ($this->yolo) {
            return $this->getYoloPasses();
        }

        $useStatementPass = new UseStatementPass();
        $namespacePass = new NamespacePass($this);
=======
     * Get default CodeCleaner passes.
     *
     * @return array
     */
    private function getDefaultPasses()
    {
        $useStatementPass = new UseStatementPass();
        $namespacePass    = new NamespacePass($this);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // Try to add implicit `use` statements and an implicit namespace,
        // based on the file in which the `debug` call was made.
        $this->addImplicitDebugContext([$useStatementPass, $namespacePass]);

        return [
            // Validation passes
            new AbstractClassPass(),
            new AssignThisVariablePass(),
            new CalledClassPass(),
            new CallTimePassByReferencePass(),
            new FinalClassPass(),
            new FunctionContextPass(),
            new FunctionReturnInWriteContextPass(),
<<<<<<< HEAD
            new IssetPass(),
=======
            new InstanceOfPass(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            new LabelContextPass(),
            new LeavePsyshAlonePass(),
            new ListPass(),
            new LoopContextPass(),
            new PassableByReferencePass(),
            new ReturnTypePass(),
            new EmptyArrayDimFetchPass(),
            new ValidConstructorPass(),

            // Rewriting shenanigans
            $useStatementPass,        // must run before the namespace pass
            new ExitPass(),
            new ImplicitReturnPass(),
            new MagicConstantsPass(),
            $namespacePass,           // must run after the implicit return pass
            new RequirePass(),
<<<<<<< HEAD
            new StrictTypesPass($this->strictTypes),

            // Namespace-aware validation (which depends on aforementioned shenanigans)
            new ValidClassNamePass(),
=======
            new StrictTypesPass(),

            // Namespace-aware validation (which depends on aforementioned shenanigans)
            new ValidClassNamePass(),
            new ValidConstantPass(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            new ValidFunctionNamePass(),
        ];
    }

    /**
<<<<<<< HEAD
     * A set of code cleaner passes that don't try to do any validation, and
     * only do minimal rewriting to make things work inside the REPL.
     *
     * This list should stay in sync with the "rewriting shenanigans" in
     * getDefaultPasses above.
     *
     * @return CodeCleanerPass[]
     */
    private function getYoloPasses(): array
    {
        $useStatementPass = new UseStatementPass();
        $namespacePass = new NamespacePass($this);

        // Try to add implicit `use` statements and an implicit namespace,
        // based on the file in which the `debug` call was made.
        $this->addImplicitDebugContext([$useStatementPass, $namespacePass]);

        return [
            new LeavePsyshAlonePass(),
            $useStatementPass,        // must run before the namespace pass
            new ExitPass(),
            new ImplicitReturnPass(),
            new MagicConstantsPass(),
            $namespacePass,           // must run after the implicit return pass
            new RequirePass(),
            new StrictTypesPass($this->strictTypes),
        ];
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * "Warm up" code cleaner passes when we're coming from a debug call.
     *
     * This is useful, for example, for `UseStatementPass` and `NamespacePass`
     * which keep track of state between calls, to maintain the current
     * namespace and a map of use statements.
     *
     * @param array $passes
     */
    private function addImplicitDebugContext(array $passes)
    {
        $file = $this->getDebugFile();
        if ($file === null) {
            return;
        }

        try {
            $code = @\file_get_contents($file);
            if (!$code) {
                return;
            }

            $stmts = $this->parse($code, true);
            if ($stmts === false) {
                return;
            }

            // Set up a clean traverser for just these code cleaner passes
<<<<<<< HEAD
            // @todo Pass visitors directly to once we drop support for PHP-Parser 4.x
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $traverser = new NodeTraverser();
            foreach ($passes as $pass) {
                $traverser->addVisitor($pass);
            }

            $traverser->traverse($stmts);
        } catch (\Throwable $e) {
            // Don't care.
<<<<<<< HEAD
=======
        } catch (\Exception $e) {
            // Still don't care.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * Search the stack trace for a file in which the user called Psy\debug.
     *
     * @return string|null
     */
    private static function getDebugFile()
    {
<<<<<<< HEAD
        $trace = \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS);
=======
        $trace = \debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach (\array_reverse($trace) as $stackFrame) {
            if (!self::isDebugCall($stackFrame)) {
                continue;
            }

            if (\preg_match('/eval\(/', $stackFrame['file'])) {
                \preg_match_all('/([^\(]+)\((\d+)/', $stackFrame['file'], $matches);

                return $matches[1][0];
            }

            return $stackFrame['file'];
        }
    }

    /**
     * Check whether a given backtrace frame is a call to Psy\debug.
     *
     * @param array $stackFrame
<<<<<<< HEAD
     */
    private static function isDebugCall(array $stackFrame): bool
    {
        $class = isset($stackFrame['class']) ? $stackFrame['class'] : null;
=======
     *
     * @return bool
     */
    private static function isDebugCall(array $stackFrame)
    {
        $class    = isset($stackFrame['class']) ? $stackFrame['class'] : null;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $function = isset($stackFrame['function']) ? $stackFrame['function'] : null;

        return ($class === null && $function === 'Psy\\debug') ||
            ($class === Shell::class && $function === 'debug');
    }

    /**
     * Clean the given array of code.
     *
     * @throws ParseErrorException if the code is invalid PHP, and cannot be coerced into valid PHP
     *
     * @param array $codeLines
     * @param bool  $requireSemicolons
     *
     * @return string|false Cleaned PHP code, False if the input is incomplete
     */
<<<<<<< HEAD
    public function clean(array $codeLines, bool $requireSemicolons = false)
    {
        $stmts = $this->parse('<?php '.\implode(\PHP_EOL, $codeLines).\PHP_EOL, $requireSemicolons);
=======
    public function clean(array $codeLines, $requireSemicolons = false)
    {
        $stmts = $this->parse('<?php ' . \implode(PHP_EOL, $codeLines) . PHP_EOL, $requireSemicolons);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if ($stmts === false) {
            return false;
        }

        // Catch fatal errors before they happen
        $stmts = $this->traverser->traverse($stmts);

        // Work around https://github.com/nikic/PHP-Parser/issues/399
<<<<<<< HEAD
        $oldLocale = \setlocale(\LC_NUMERIC, 0);
        \setlocale(\LC_NUMERIC, 'C');
=======
        $oldLocale = \setlocale(LC_NUMERIC, 0);
        \setlocale(LC_NUMERIC, 'C');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $code = $this->printer->prettyPrint($stmts);

        // Now put the locale back
<<<<<<< HEAD
        \setlocale(\LC_NUMERIC, $oldLocale);
=======
        \setlocale(LC_NUMERIC, $oldLocale);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $code;
    }

    /**
     * Set the current local namespace.
     *
     * @param array|null $namespace (default: null)
<<<<<<< HEAD
     */
    public function setNamespace(?array $namespace = null)
=======
     *
     * @return array|null
     */
    public function setNamespace(array $namespace = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->namespace = $namespace;
    }

    /**
     * Get the current local namespace.
     *
     * @return array|null
     */
    public function getNamespace()
    {
        return $this->namespace;
    }

    /**
     * Lex and parse a block of code.
     *
     * @see Parser::parse
     *
     * @throws ParseErrorException for parse errors that can't be resolved by
     *                             waiting a line to see what comes next
     *
     * @param string $code
     * @param bool   $requireSemicolons
     *
     * @return array|false A set of statements, or false if incomplete
     */
<<<<<<< HEAD
    protected function parse(string $code, bool $requireSemicolons = false)
=======
    protected function parse($code, $requireSemicolons = false)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        try {
            return $this->parser->parse($code);
        } catch (\PhpParser\Error $e) {
            if ($this->parseErrorIsUnclosedString($e, $code)) {
                return false;
            }

            if ($this->parseErrorIsUnterminatedComment($e, $code)) {
                return false;
            }

            if ($this->parseErrorIsTrailingComma($e, $code)) {
                return false;
            }

            if (!$this->parseErrorIsEOF($e)) {
                throw ParseErrorException::fromParseError($e);
            }

            if ($requireSemicolons) {
                return false;
            }

            try {
                // Unexpected EOF, try again with an implicit semicolon
<<<<<<< HEAD
                return $this->parser->parse($code.';');
=======
                return $this->parser->parse($code . ';');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } catch (\PhpParser\Error $e) {
                return false;
            }
        }
    }

<<<<<<< HEAD
    private function parseErrorIsEOF(\PhpParser\Error $e): bool
=======
    private function parseErrorIsEOF(\PhpParser\Error $e)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $msg = $e->getRawMessage();

        return ($msg === 'Unexpected token EOF') || (\strpos($msg, 'Syntax error, unexpected EOF') !== false);
    }

    /**
     * A special test for unclosed single-quoted strings.
     *
     * Unlike (all?) other unclosed statements, single quoted strings have
     * their own special beautiful snowflake syntax error just for
     * themselves.
     *
     * @param \PhpParser\Error $e
     * @param string           $code
<<<<<<< HEAD
     */
    private function parseErrorIsUnclosedString(\PhpParser\Error $e, string $code): bool
=======
     *
     * @return bool
     */
    private function parseErrorIsUnclosedString(\PhpParser\Error $e, $code)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($e->getRawMessage() !== 'Syntax error, unexpected T_ENCAPSED_AND_WHITESPACE') {
            return false;
        }

        try {
<<<<<<< HEAD
            $this->parser->parse($code."';");
        } catch (\Throwable $e) {
=======
            $this->parser->parse($code . "';");
        } catch (\Exception $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        return true;
    }

<<<<<<< HEAD
    private function parseErrorIsUnterminatedComment(\PhpParser\Error $e, $code): bool
=======
    private function parseErrorIsUnterminatedComment(\PhpParser\Error $e, $code)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $e->getRawMessage() === 'Unterminated comment';
    }

<<<<<<< HEAD
    private function parseErrorIsTrailingComma(\PhpParser\Error $e, $code): bool
=======
    private function parseErrorIsTrailingComma(\PhpParser\Error $e, $code)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return ($e->getRawMessage() === 'A trailing comma is not allowed here') && (\substr(\rtrim($code), -1) === ',');
    }
}
