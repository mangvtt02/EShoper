<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\Annotation;

<<<<<<< HEAD
use const JSON_ERROR_NONE;
use const PREG_OFFSET_CAPTURE;
use function array_filter;
use function array_key_exists;
use function array_map;
use function array_merge;
use function array_pop;
use function array_slice;
use function array_values;
use function constant;
use function count;
use function defined;
use function explode;
use function file;
use function implode;
use function is_array;
use function is_int;
use function is_numeric;
use function is_string;
use function json_decode;
use function json_last_error;
use function json_last_error_msg;
use function preg_match;
use function preg_match_all;
use function preg_replace;
use function preg_split;
use function realpath;
use function rtrim;
use function sprintf;
use function str_replace;
use function strlen;
use function strpos;
use function strtolower;
use function substr;
use function substr_count;
use function trim;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PharIo\Version\VersionConstraintParser;
use PHPUnit\Framework\InvalidDataProviderException;
use PHPUnit\Framework\SkippedTestError;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Exception;
use PHPUnit\Util\InvalidDataSetException;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use ReflectionFunctionAbstract;
use ReflectionMethod;
use Reflector;
use Traversable;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * This is an abstraction around a PHPUnit-specific docBlock,
 * allowing us to ask meaningful questions about a specific
 * reflection symbol.
 *
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class DocBlock
{
    /**
     * @todo This constant should be private (it's public because of TestTest::testGetProvidedDataRegEx)
     */
    public const REGEX_DATA_PROVIDER = '/@dataProvider\s+([a-zA-Z0-9._:-\\\\x7f-\xff]+)/';

<<<<<<< HEAD
    private const REGEX_REQUIRES_VERSION            = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';
    private const REGEX_REQUIRES_VERSION_CONSTRAINT = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<constraint>[\d\t \-.|~^]+)[ \t]*\r?$/m';
    private const REGEX_REQUIRES_OS                 = '/@requires\s+(?P<name>OS(?:FAMILY)?)\s+(?P<value>.+?)[ \t]*\r?$/m';
    private const REGEX_REQUIRES_SETTING            = '/@requires\s+(?P<name>setting)\s+(?P<setting>([^ ]+?))\s*(?P<value>[\w\.-]+[\w\.]?)?[ \t]*\r?$/m';
    private const REGEX_REQUIRES                    = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^\s<>=!]+))\s*(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+[\d\.]?)?[ \t]*\r?$/m';
    private const REGEX_TEST_WITH                   = '/@testWith\s+/';
    private const REGEX_EXPECTED_EXCEPTION          = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
=======
    private const REGEX_REQUIRES_VERSION = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+(dev|(RC|alpha|beta)[\d\.])?)[ \t]*\r?$/m';

    private const REGEX_REQUIRES_VERSION_CONSTRAINT = '/@requires\s+(?P<name>PHP(?:Unit)?)\s+(?P<constraint>[\d\t \-.|~^]+)[ \t]*\r?$/m';

    private const REGEX_REQUIRES_OS = '/@requires\s+(?P<name>OS(?:FAMILY)?)\s+(?P<value>.+?)[ \t]*\r?$/m';

    private const REGEX_REQUIRES_SETTING = '/@requires\s+(?P<name>setting)\s+(?P<setting>([^ ]+?))\s*(?P<value>[\w\.-]+[\w\.]?)?[ \t]*\r?$/m';

    private const REGEX_REQUIRES = '/@requires\s+(?P<name>function|extension)\s+(?P<value>([^\s<>=!]+))\s*(?P<operator>[<>=!]{0,2})\s*(?P<version>[\d\.-]+[\d\.]?)?[ \t]*\r?$/m';

    private const REGEX_TEST_WITH = '/@testWith\s+/';

    private const REGEX_EXPECTED_EXCEPTION = '(@expectedException\s+([:.\w\\\\x7f-\xff]+)(?:[\t ]+(\S*))?(?:[\t ]+(\S*))?\s*$)m';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /** @var string */
    private $docComment;

    /** @var bool */
    private $isMethod;

    /** @var array<string, array<int, string>> pre-parsed annotations indexed by name and occurrence index */
    private $symbolAnnotations;

    /**
     * @var null|array<string, mixed>
     *
     * @psalm-var null|(array{
     *   __OFFSET: array<string, int>&array{__FILE: string},
     *   setting?: array<string, string>,
     *   extension_versions?: array<string, array{version: string, operator: string}>
     * }&array<
     *   string,
     *   string|array{version: string, operator: string}|array{constraint: string}|array<int|string, string>
     * >)
     */
    private $parsedRequirements;

    /** @var int */
    private $startLine;

    /** @var int */
    private $endLine;

    /** @var string */
    private $fileName;

    /** @var string */
    private $name;

    /**
     * @var string
     *
     * @psalm-var class-string
     */
    private $className;

<<<<<<< HEAD
    public static function ofClass(ReflectionClass $class): self
=======
    public static function ofClass(\ReflectionClass $class): self
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $className = $class->getName();

        return new self(
            (string) $class->getDocComment(),
            false,
            self::extractAnnotationsFromReflector($class),
            $class->getStartLine(),
            $class->getEndLine(),
            $class->getFileName(),
            $className,
            $className
        );
    }

    /**
     * @psalm-param class-string $classNameInHierarchy
     */
<<<<<<< HEAD
    public static function ofMethod(ReflectionMethod $method, string $classNameInHierarchy): self
=======
    public static function ofMethod(\ReflectionMethod $method, string $classNameInHierarchy): self
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new self(
            (string) $method->getDocComment(),
            true,
            self::extractAnnotationsFromReflector($method),
            $method->getStartLine(),
            $method->getEndLine(),
            $method->getFileName(),
            $method->getName(),
            $classNameInHierarchy
        );
    }

    /**
     * Note: we do not preserve an instance of the reflection object, since it cannot be safely (de-)serialized.
     *
     * @param array<string, array<int, string>> $symbolAnnotations
     *
     * @psalm-param class-string $className
     */
    private function __construct(string $docComment, bool $isMethod, array $symbolAnnotations, int $startLine, int $endLine, string $fileName, string $name, string $className)
    {
        $this->docComment        = $docComment;
        $this->isMethod          = $isMethod;
        $this->symbolAnnotations = $symbolAnnotations;
        $this->startLine         = $startLine;
        $this->endLine           = $endLine;
        $this->fileName          = $fileName;
        $this->name              = $name;
        $this->className         = $className;
    }

    /**
     * @psalm-return array{
     *   __OFFSET: array<string, int>&array{__FILE: string},
     *   setting?: array<string, string>,
     *   extension_versions?: array<string, array{version: string, operator: string}>
     * }&array<
     *   string,
     *   string|array{version: string, operator: string}|array{constraint: string}|array<int|string, string>
     * >
     *
     * @throws Warning if the requirements version constraint is not well-formed
     */
    public function requirements(): array
    {
        if ($this->parsedRequirements !== null) {
            return $this->parsedRequirements;
        }

        $offset            = $this->startLine;
        $requires          = [];
        $recordedSettings  = [];
        $extensionVersions = [];
        $recordedOffsets   = [
<<<<<<< HEAD
            '__FILE' => realpath($this->fileName),
        ];

        // Trim docblock markers, split it into lines and rewind offset to start of docblock
        $lines = preg_replace(['#^/\*{2}#', '#\*/$#'], '', preg_split('/\r\n|\r|\n/', $this->docComment));
        $offset -= count($lines);

        foreach ($lines as $line) {
            if (preg_match(self::REGEX_REQUIRES_OS, $line, $matches)) {
=======
            '__FILE' => \realpath($this->fileName),
        ];

        // Split docblock into lines and rewind offset to start of docblock
        $lines  = \preg_split('/\r\n|\r|\n/', $this->docComment);
        $offset -= \count($lines);

        foreach ($lines as $line) {
            if (\preg_match(self::REGEX_REQUIRES_OS, $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $requires[$matches['name']]        = $matches['value'];
                $recordedOffsets[$matches['name']] = $offset;
            }

<<<<<<< HEAD
            if (preg_match(self::REGEX_REQUIRES_VERSION, $line, $matches)) {
                $requires[$matches['name']] = [
=======
            if (\preg_match(self::REGEX_REQUIRES_VERSION, $line, $matches)) {
                $requires[$matches['name']]        = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'version'  => $matches['version'],
                    'operator' => $matches['operator'],
                ];
                $recordedOffsets[$matches['name']] = $offset;
            }

<<<<<<< HEAD
            if (preg_match(self::REGEX_REQUIRES_VERSION_CONSTRAINT, $line, $matches)) {
=======
            if (\preg_match(self::REGEX_REQUIRES_VERSION_CONSTRAINT, $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                if (!empty($requires[$matches['name']])) {
                    $offset++;

                    continue;
                }

                try {
                    $versionConstraintParser = new VersionConstraintParser;

<<<<<<< HEAD
                    $requires[$matches['name'] . '_constraint'] = [
                        'constraint' => $versionConstraintParser->parse(trim($matches['constraint'])),
=======
                    $requires[$matches['name'] . '_constraint']        = [
                        'constraint' => $versionConstraintParser->parse(\trim($matches['constraint'])),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    ];
                    $recordedOffsets[$matches['name'] . '_constraint'] = $offset;
                } catch (\PharIo\Version\Exception $e) {
                    /* @TODO this catch is currently not valid, see https://github.com/phar-io/version/issues/16 */
                    throw new Warning($e->getMessage(), $e->getCode(), $e);
                }
            }

<<<<<<< HEAD
            if (preg_match(self::REGEX_REQUIRES_SETTING, $line, $matches)) {
=======
            if (\preg_match(self::REGEX_REQUIRES_SETTING, $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $recordedSettings[$matches['setting']]               = $matches['value'];
                $recordedOffsets['__SETTING_' . $matches['setting']] = $offset;
            }

<<<<<<< HEAD
            if (preg_match(self::REGEX_REQUIRES, $line, $matches)) {
=======
            if (\preg_match(self::REGEX_REQUIRES, $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $name = $matches['name'] . 's';

                if (!isset($requires[$name])) {
                    $requires[$name] = [];
                }

                $requires[$name][]                                           = $matches['value'];
                $recordedOffsets[$matches['name'] . '_' . $matches['value']] = $offset;

                if ($name === 'extensions' && !empty($matches['version'])) {
                    $extensionVersions[$matches['value']] = [
                        'version'  => $matches['version'],
                        'operator' => $matches['operator'],
                    ];
                }
            }

            $offset++;
        }

<<<<<<< HEAD
        return $this->parsedRequirements = array_merge(
            $requires,
            ['__OFFSET' => $recordedOffsets],
            array_filter([
=======
        return $this->parsedRequirements = \array_merge(
            $requires,
            ['__OFFSET' => $recordedOffsets],
            \array_filter([
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'setting'            => $recordedSettings,
                'extension_versions' => $extensionVersions,
            ])
        );
    }

    /**
     * @return array|bool
     *
     * @psalm-return false|array{
     *   class: class-string,
     *   code: int|string|null,
     *   message: string,
     *   message_regex: string
     * }
     */
    public function expectedException()
    {
<<<<<<< HEAD
        $docComment = (string) substr($this->docComment, 3, -2);

        if (1 !== preg_match(self::REGEX_EXPECTED_EXCEPTION, $docComment, $matches)) {
=======
        $docComment = (string) \substr($this->docComment, 3, -2);

        if (1 !== \preg_match(self::REGEX_EXPECTED_EXCEPTION, $docComment, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        /** @psalm-var class-string $class */
        $class         = $matches[1];
        $annotations   = $this->symbolAnnotations();
        $code          = null;
        $message       = '';
        $messageRegExp = '';

        if (isset($matches[2])) {
<<<<<<< HEAD
            $message = trim($matches[2]);
=======
            $message = \trim($matches[2]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } elseif (isset($annotations['expectedExceptionMessage'])) {
            $message = $this->parseAnnotationContent($annotations['expectedExceptionMessage'][0]);
        }

        if (isset($annotations['expectedExceptionMessageRegExp'])) {
            $messageRegExp = $this->parseAnnotationContent($annotations['expectedExceptionMessageRegExp'][0]);
        }

        if (isset($matches[3])) {
            $code = $matches[3];
        } elseif (isset($annotations['expectedExceptionCode'])) {
            $code = $this->parseAnnotationContent($annotations['expectedExceptionCode'][0]);
        }

<<<<<<< HEAD
        if (is_numeric($code)) {
            $code = (int) $code;
        } elseif (is_string($code) && defined($code)) {
            $code = (int) constant($code);
=======
        if (\is_numeric($code)) {
            $code = (int) $code;
        } elseif (\is_string($code) && \defined($code)) {
            $code = (int) \constant($code);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return [
            'class'         => $class,
            'code'          => $code,
            'message'       => $message,
            'message_regex' => $messageRegExp,
        ];
    }

    /**
     * Returns the provided data for a method.
     *
     * @throws Exception
     */
    public function getProvidedData(): ?array
    {
        /** @noinspection SuspiciousBinaryOperationInspection */
        $data = $this->getDataFromDataProviderAnnotation($this->docComment) ?? $this->getDataFromTestWithAnnotation($this->docComment);

        if ($data === null) {
            return null;
        }

        if ($data === []) {
            throw new SkippedTestError;
        }

        foreach ($data as $key => $value) {
<<<<<<< HEAD
            if (!is_array($value)) {
                throw new InvalidDataSetException(
                    sprintf(
                        'Data set %s is invalid.',
                        is_int($key) ? '#' . $key : '"' . $key . '"'
=======
            if (!\is_array($value)) {
                throw new InvalidDataSetException(
                    \sprintf(
                        'Data set %s is invalid.',
                        \is_int($key) ? '#' . $key : '"' . $key . '"'
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    )
                );
            }
        }

        return $data;
    }

    /**
     * @psalm-return array<string, array{line: int, value: string}>
     */
    public function getInlineAnnotations(): array
    {
<<<<<<< HEAD
        $code        = file($this->fileName);
        $lineNumber  = $this->startLine;
        $startLine   = $this->startLine - 1;
        $endLine     = $this->endLine - 1;
        $codeLines   = array_slice($code, $startLine, $endLine - $startLine + 1);
        $annotations = [];

        foreach ($codeLines as $line) {
            if (preg_match('#/\*\*?\s*@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?\*/$#m', $line, $matches)) {
                $annotations[strtolower($matches['name'])] = [
=======
        $code        = \file($this->fileName);
        $lineNumber  = $this->startLine;
        $startLine   = $this->startLine - 1;
        $endLine     = $this->endLine - 1;
        $codeLines   = \array_slice($code, $startLine, $endLine - $startLine + 1);
        $annotations = [];

        foreach ($codeLines as $line) {
            if (\preg_match('#/\*\*?\s*@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?\*/$#m', $line, $matches)) {
                $annotations[\strtolower($matches['name'])] = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'line'  => $lineNumber,
                    'value' => $matches['value'],
                ];
            }

            $lineNumber++;
        }

        return $annotations;
    }

    public function symbolAnnotations(): array
    {
        return $this->symbolAnnotations;
    }

    public function isHookToBeExecutedBeforeClass(): bool
    {
<<<<<<< HEAD
        return $this->isMethod &&
            false !== strpos($this->docComment, '@beforeClass');
=======
        return $this->isMethod
            && false !== \strpos($this->docComment, '@beforeClass');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function isHookToBeExecutedAfterClass(): bool
    {
<<<<<<< HEAD
        return $this->isMethod &&
            false !== strpos($this->docComment, '@afterClass');
=======
        return $this->isMethod
            && false !== \strpos($this->docComment, '@afterClass');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function isToBeExecutedBeforeTest(): bool
    {
<<<<<<< HEAD
        return 1 === preg_match('/@before\b/', $this->docComment);
=======
        return 1 === \preg_match('/@before\b/', $this->docComment);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function isToBeExecutedAfterTest(): bool
    {
<<<<<<< HEAD
        return 1 === preg_match('/@after\b/', $this->docComment);
    }

    /**
     * Parse annotation content to use constant/class constant values.
=======
        return 1 === \preg_match('/@after\b/', $this->docComment);
    }

    /**
     * Parse annotation content to use constant/class constant values
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * Constants are specified using a starting '@'. For example: @ClassName::CONST_NAME
     *
     * If the constant is not found the string is used as is to ensure maximum BC.
     */
    private function parseAnnotationContent(string $message): string
    {
<<<<<<< HEAD
        if (defined($message) &&
            (strpos($message, '::') !== false && substr_count($message, '::') + 1 === 2)) {
            return constant($message);
=======
        if (\defined($message) &&
            (\strpos($message, '::') !== false && \substr_count($message, '::') + 1 === 2)) {
            return \constant($message);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $message;
    }

    private function getDataFromDataProviderAnnotation(string $docComment): ?array
    {
        $methodName = null;
        $className  = $this->className;

        if ($this->isMethod) {
            $methodName = $this->name;
        }

<<<<<<< HEAD
        if (!preg_match_all(self::REGEX_DATA_PROVIDER, $docComment, $matches)) {
=======
        if (!\preg_match_all(self::REGEX_DATA_PROVIDER, $docComment, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return null;
        }

        $result = [];

        foreach ($matches[1] as $match) {
<<<<<<< HEAD
            $dataProviderMethodNameNamespace = explode('\\', $match);
            $leaf                            = explode('::', array_pop($dataProviderMethodNameNamespace));
            $dataProviderMethodName          = array_pop($leaf);
=======
            $dataProviderMethodNameNamespace = \explode('\\', $match);
            $leaf                            = \explode('::', \array_pop($dataProviderMethodNameNamespace));
            $dataProviderMethodName          = \array_pop($leaf);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if (empty($dataProviderMethodNameNamespace)) {
                $dataProviderMethodNameNamespace = '';
            } else {
<<<<<<< HEAD
                $dataProviderMethodNameNamespace = implode('\\', $dataProviderMethodNameNamespace) . '\\';
=======
                $dataProviderMethodNameNamespace = \implode('\\', $dataProviderMethodNameNamespace) . '\\';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            if (empty($leaf)) {
                $dataProviderClassName = $className;
            } else {
                /** @psalm-var class-string $dataProviderClassName */
<<<<<<< HEAD
                $dataProviderClassName = $dataProviderMethodNameNamespace . array_pop($leaf);
            }

            try {
                $dataProviderClass = new ReflectionClass($dataProviderClassName);
=======
                $dataProviderClassName = $dataProviderMethodNameNamespace . \array_pop($leaf);
            }

            try {
                $dataProviderClass = new \ReflectionClass($dataProviderClassName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $dataProviderMethod = $dataProviderClass->getMethod(
                    $dataProviderMethodName
                );
                // @codeCoverageIgnoreStart
<<<<<<< HEAD
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
            } catch (\ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    (int) $e->getCode(),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $e
                );
                // @codeCoverageIgnoreEnd
            }

            if ($dataProviderMethod->isStatic()) {
                $object = null;
            } else {
                $object = $dataProviderClass->newInstance();
            }

            if ($dataProviderMethod->getNumberOfParameters() === 0) {
                $data = $dataProviderMethod->invoke($object);
            } else {
                $data = $dataProviderMethod->invoke($object, $methodName);
            }

<<<<<<< HEAD
            if ($data instanceof Traversable) {
=======
            if ($data instanceof \Traversable) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $origData = $data;
                $data     = [];

                foreach ($origData as $key => $value) {
<<<<<<< HEAD
                    if (is_int($key)) {
                        $data[] = $value;
                    } elseif (array_key_exists($key, $data)) {
                        throw new InvalidDataProviderException(
                            sprintf(
=======
                    if (\is_int($key)) {
                        $data[] = $value;
                    } elseif (\array_key_exists($key, $data)) {
                        throw new InvalidDataProviderException(
                            \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                                'The key "%s" has already been defined in the data provider "%s".',
                                $key,
                                $match
                            )
                        );
                    } else {
                        $data[$key] = $value;
                    }
                }
            }

<<<<<<< HEAD
            if (is_array($data)) {
                $result = array_merge($result, $data);
=======
            if (\is_array($data)) {
                $result = \array_merge($result, $data);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $result;
    }

    /**
     * @throws Exception
     */
    private function getDataFromTestWithAnnotation(string $docComment): ?array
    {
        $docComment = $this->cleanUpMultiLineAnnotation($docComment);

<<<<<<< HEAD
        if (!preg_match(self::REGEX_TEST_WITH, $docComment, $matches, PREG_OFFSET_CAPTURE)) {
            return null;
        }

        $offset            = strlen($matches[0][0]) + $matches[0][1];
        $annotationContent = substr($docComment, $offset);
        $data              = [];

        foreach (explode("\n", $annotationContent) as $candidateRow) {
            $candidateRow = trim($candidateRow);
=======
        if (!\preg_match(self::REGEX_TEST_WITH, $docComment, $matches, \PREG_OFFSET_CAPTURE)) {
            return null;
        }

        $offset            = \strlen($matches[0][0]) + $matches[0][1];
        $annotationContent = \substr($docComment, $offset);
        $data              = [];

        foreach (\explode("\n", $annotationContent) as $candidateRow) {
            $candidateRow = \trim($candidateRow);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if ($candidateRow[0] !== '[') {
                break;
            }

<<<<<<< HEAD
            $dataSet = json_decode($candidateRow, true);

            if (json_last_error() !== JSON_ERROR_NONE) {
                throw new Exception(
                    'The data set for the @testWith annotation cannot be parsed: ' . json_last_error_msg()
=======
            $dataSet = \json_decode($candidateRow, true);

            if (\json_last_error() !== \JSON_ERROR_NONE) {
                throw new Exception(
                    'The data set for the @testWith annotation cannot be parsed: ' . \json_last_error_msg()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                );
            }

            $data[] = $dataSet;
        }

        if (!$data) {
            throw new Exception('The data set for the @testWith annotation cannot be parsed.');
        }

        return $data;
    }

    private function cleanUpMultiLineAnnotation(string $docComment): string
    {
<<<<<<< HEAD
        // removing initial '   * ' for docComment
        $docComment = str_replace("\r\n", "\n", $docComment);
        $docComment = preg_replace('/\n\s*\*\s?/', "\n", $docComment);
        $docComment = (string) substr($docComment, 0, -1);

        return rtrim($docComment, "\n");
=======
        //removing initial '   * ' for docComment
        $docComment = \str_replace("\r\n", "\n", $docComment);
        $docComment = \preg_replace('/' . '\n' . '\s*' . '\*' . '\s?' . '/', "\n", $docComment);
        $docComment = (string) \substr($docComment, 0, -1);

        return \rtrim($docComment, "\n");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /** @return array<string, array<int, string>> */
    private static function parseDocBlock(string $docBlock): array
    {
        // Strip away the docblock header and footer to ease parsing of one line annotations
<<<<<<< HEAD
        $docBlock    = (string) substr($docBlock, 3, -2);
        $annotations = [];

        if (preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docBlock, $matches)) {
            $numMatches = count($matches[0]);

            for ($i = 0; $i < $numMatches; $i++) {
=======
        $docBlock    = (string) \substr($docBlock, 3, -2);
        $annotations = [];

        if (\preg_match_all('/@(?P<name>[A-Za-z_-]+)(?:[ \t]+(?P<value>.*?))?[ \t]*\r?$/m', $docBlock, $matches)) {
            $numMatches = \count($matches[0]);

            for ($i = 0; $i < $numMatches; ++$i) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $annotations[$matches['name'][$i]][] = (string) $matches['value'][$i];
            }
        }

        return $annotations;
    }

<<<<<<< HEAD
    /** @param ReflectionClass|ReflectionFunctionAbstract $reflector */
    private static function extractAnnotationsFromReflector(Reflector $reflector): array
    {
        $annotations = [];

        if ($reflector instanceof ReflectionClass) {
            $annotations = array_merge(
                $annotations,
                ...array_map(
                    static function (ReflectionClass $trait): array
                    {
                        return self::parseDocBlock((string) $trait->getDocComment());
                    },
                    array_values($reflector->getTraits())
=======
    /** @param \ReflectionClass|\ReflectionFunctionAbstract $reflector */
    private static function extractAnnotationsFromReflector(\Reflector $reflector): array
    {
        $annotations = [];

        if ($reflector instanceof \ReflectionClass) {
            $annotations = \array_merge(
                $annotations,
                ...\array_map(
                    function (\ReflectionClass $trait): array {
                        return self::parseDocBlock((string) $trait->getDocComment());
                    },
                    \array_values($reflector->getTraits())
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                )
            );
        }

<<<<<<< HEAD
        return array_merge(
=======
        return \array_merge(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $annotations,
            self::parseDocBlock((string) $reflector->getDocComment())
        );
    }
}
