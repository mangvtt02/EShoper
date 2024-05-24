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
use const ENT_QUOTES;
use function assert;
use function chdir;
use function class_exists;
use function dirname;
use function error_reporting;
use function file_get_contents;
use function getcwd;
use function gettype;
use function htmlspecialchars;
use function is_string;
use function libxml_get_errors;
use function libxml_use_internal_errors;
use function mb_convert_encoding;
use function ord;
use function preg_replace;
use function settype;
use function sprintf;
use function strlen;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use DOMCharacterData;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMText;
use PHPUnit\Framework\Exception;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Xml
{
    public static function import(DOMElement $element): DOMElement
    {
        return (new DOMDocument)->importNode($element, true);
    }

    /**
     * Load an $actual document into a DOMDocument.  This is called
     * from the selector assertions.
     *
     * If $actual is already a DOMDocument, it is returned with
     * no changes.  Otherwise, $actual is loaded into a new DOMDocument
     * as either HTML or XML, depending on the value of $isHtml. If $isHtml is
     * false and $xinclude is true, xinclude is performed on the loaded
     * DOMDocument.
     *
     * Note: prior to PHPUnit 3.3.0, this method loaded a file and
     * not a string as it currently does.  To load a file into a
     * DOMDocument, use loadFile() instead.
     *
     * @param DOMDocument|string $actual
     *
     * @throws Exception
     */
    public static function load($actual, bool $isHtml = false, string $filename = '', bool $xinclude = false, bool $strict = false): DOMDocument
    {
        if ($actual instanceof DOMDocument) {
            return $actual;
        }

<<<<<<< HEAD
        if (!is_string($actual)) {
            throw new Exception('Could not load XML from ' . gettype($actual));
=======
        if (!\is_string($actual)) {
            throw new Exception('Could not load XML from ' . \gettype($actual));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($actual === '') {
            throw new Exception('Could not load XML from empty string');
        }

        // Required for XInclude on Windows.
        if ($xinclude) {
<<<<<<< HEAD
            $cwd = getcwd();
            @chdir(dirname($filename));
=======
            $cwd = \getcwd();
            @\chdir(\dirname($filename));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $document                     = new DOMDocument;
        $document->preserveWhiteSpace = false;

<<<<<<< HEAD
        $internal  = libxml_use_internal_errors(true);
        $message   = '';
        $reporting = error_reporting(0);
=======
        $internal  = \libxml_use_internal_errors(true);
        $message   = '';
        $reporting = \error_reporting(0);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($filename !== '') {
            // Required for XInclude
            $document->documentURI = $filename;
        }

        if ($isHtml) {
            $loaded = $document->loadHTML($actual);
        } else {
            $loaded = $document->loadXML($actual);
        }

        if (!$isHtml && $xinclude) {
            $document->xinclude();
        }

<<<<<<< HEAD
        foreach (libxml_get_errors() as $error) {
            $message .= "\n" . $error->message;
        }

        libxml_use_internal_errors($internal);
        error_reporting($reporting);

        if (isset($cwd)) {
            @chdir($cwd);
=======
        foreach (\libxml_get_errors() as $error) {
            $message .= "\n" . $error->message;
        }

        \libxml_use_internal_errors($internal);
        \error_reporting($reporting);

        if (isset($cwd)) {
            @\chdir($cwd);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if ($loaded === false || ($strict && $message !== '')) {
            if ($filename !== '') {
                throw new Exception(
<<<<<<< HEAD
                    sprintf(
=======
                    \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'Could not load "%s".%s',
                        $filename,
                        $message !== '' ? "\n" . $message : ''
                    )
                );
            }

            if ($message === '') {
                $message = 'Could not load XML for unknown reason';
            }

            throw new Exception($message);
        }

        return $document;
    }

    /**
     * Loads an XML (or HTML) file into a DOMDocument object.
     *
     * @throws Exception
     */
    public static function loadFile(string $filename, bool $isHtml = false, bool $xinclude = false, bool $strict = false): DOMDocument
    {
<<<<<<< HEAD
        $reporting = error_reporting(0);
        $contents  = file_get_contents($filename);

        error_reporting($reporting);

        if ($contents === false) {
            throw new Exception(
                sprintf(
=======
        $reporting = \error_reporting(0);
        $contents  = \file_get_contents($filename);

        \error_reporting($reporting);

        if ($contents === false) {
            throw new Exception(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Could not read "%s".',
                    $filename
                )
            );
        }

        return self::load($contents, $isHtml, $filename, $xinclude, $strict);
    }

    public static function removeCharacterDataNodes(DOMNode $node): void
    {
        if ($node->hasChildNodes()) {
            for ($i = $node->childNodes->length - 1; $i >= 0; $i--) {
                if (($child = $node->childNodes->item($i)) instanceof DOMCharacterData) {
                    $node->removeChild($child);
                }
            }
        }
    }

    /**
<<<<<<< HEAD
     * Escapes a string for the use in XML documents.
=======
     * Escapes a string for the use in XML documents
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * Any Unicode character is allowed, excluding the surrogate blocks, FFFE,
     * and FFFF (not even as character reference).
     *
     * @see https://www.w3.org/TR/xml/#charsets
     */
    public static function prepareString(string $string): string
    {
<<<<<<< HEAD
        return preg_replace(
            '/[\\x00-\\x08\\x0b\\x0c\\x0e-\\x1f\\x7f]/',
            '',
            htmlspecialchars(
                self::convertToUtf8($string),
                ENT_QUOTES
=======
        return \preg_replace(
            '/[\\x00-\\x08\\x0b\\x0c\\x0e-\\x1f\\x7f]/',
            '',
            \htmlspecialchars(
                self::convertToUtf8($string),
                \ENT_QUOTES
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            )
        );
    }

    /**
     * "Convert" a DOMElement object into a PHP variable.
     */
    public static function xmlToVariable(DOMElement $element)
    {
        $variable = null;

        switch ($element->tagName) {
            case 'array':
                $variable = [];

                foreach ($element->childNodes as $entry) {
                    if (!$entry instanceof DOMElement || $entry->tagName !== 'element') {
                        continue;
                    }
                    $item = $entry->childNodes->item(0);

                    if ($item instanceof DOMText) {
                        $item = $entry->childNodes->item(1);
                    }

                    $value = self::xmlToVariable($item);

                    if ($entry->hasAttribute('key')) {
                        $variable[(string) $entry->getAttribute('key')] = $value;
                    } else {
                        $variable[] = $value;
                    }
                }

                break;

            case 'object':
                $className = $element->getAttribute('class');

                if ($element->hasChildNodes()) {
                    $arguments       = $element->childNodes->item(0)->childNodes;
                    $constructorArgs = [];

                    foreach ($arguments as $argument) {
                        if ($argument instanceof DOMElement) {
                            $constructorArgs[] = self::xmlToVariable($argument);
                        }
                    }

                    try {
<<<<<<< HEAD
                        assert(class_exists($className));

                        $variable = (new ReflectionClass($className))->newInstanceArgs($constructorArgs);
                        // @codeCoverageIgnoreStart
                    } catch (ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            $e->getCode(),
=======
                        \assert(\class_exists($className));

                        $variable = (new \ReflectionClass($className))->newInstanceArgs($constructorArgs);
                        // @codeCoverageIgnoreStart
                    } catch (\ReflectionException $e) {
                        throw new Exception(
                            $e->getMessage(),
                            (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            $e
                        );
                    }
                    // @codeCoverageIgnoreEnd
                } else {
                    $variable = new $className;
                }

                break;

            case 'boolean':
                $variable = $element->textContent === 'true';

                break;

            case 'integer':
            case 'double':
            case 'string':
                $variable = $element->textContent;

<<<<<<< HEAD
                settype($variable, $element->tagName);
=======
                \settype($variable, $element->tagName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                break;
        }

        return $variable;
    }

    private static function convertToUtf8(string $string): string
    {
        if (!self::isUtf8($string)) {
<<<<<<< HEAD
            $string = mb_convert_encoding($string, 'UTF-8');
=======
            $string = \mb_convert_encoding($string, 'UTF-8');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $string;
    }

    private static function isUtf8(string $string): bool
    {
<<<<<<< HEAD
        $length = strlen($string);

        for ($i = 0; $i < $length; $i++) {
            if (ord($string[$i]) < 0x80) {
                $n = 0;
            } elseif ((ord($string[$i]) & 0xE0) === 0xC0) {
                $n = 1;
            } elseif ((ord($string[$i]) & 0xF0) === 0xE0) {
                $n = 2;
            } elseif ((ord($string[$i]) & 0xF0) === 0xF0) {
=======
        $length = \strlen($string);

        for ($i = 0; $i < $length; $i++) {
            if (\ord($string[$i]) < 0x80) {
                $n = 0;
            } elseif ((\ord($string[$i]) & 0xE0) === 0xC0) {
                $n = 1;
            } elseif ((\ord($string[$i]) & 0xF0) === 0xE0) {
                $n = 2;
            } elseif ((\ord($string[$i]) & 0xF0) === 0xF0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $n = 3;
            } else {
                return false;
            }

            for ($j = 0; $j < $n; $j++) {
<<<<<<< HEAD
                if ((++$i === $length) || ((ord($string[$i]) & 0xC0) !== 0x80)) {
=======
                if ((++$i === $length) || ((\ord($string[$i]) & 0xC0) !== 0x80)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return false;
                }
            }
        }

        return true;
    }
}
