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
use const DIRECTORY_SEPARATOR;
use const PATH_SEPARATOR;
use const PHP_VERSION;
use function assert;
use function constant;
use function count;
use function define;
use function defined;
use function dirname;
use function explode;
use function file_exists;
use function file_get_contents;
use function getenv;
use function implode;
use function in_array;
use function ini_get;
use function ini_set;
use function is_numeric;
use function libxml_clear_errors;
use function libxml_get_errors;
use function libxml_use_internal_errors;
use function preg_match;
use function putenv;
use function realpath;
use function sprintf;
use function stream_resolve_include_path;
use function strlen;
use function strpos;
use function strtolower;
use function strtoupper;
use function substr;
use function trim;
use function version_compare;
use DOMDocument;
use DOMElement;
use DOMNode;
use DOMNodeList;
use DOMXPath;
use LibXMLError;
=======
use DOMElement;
use DOMXPath;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\TestSuiteSorter;
use PHPUnit\TextUI\ResultPrinter;
use PHPUnit\Util\TestDox\CliTestDoxPrinter;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Configuration
{
    /**
     * @var self[]
     */
    private static $instances = [];

    /**
<<<<<<< HEAD
     * @var DOMDocument
=======
     * @var \DOMDocument
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $document;

    /**
     * @var DOMXPath
     */
    private $xpath;

    /**
     * @var string
     */
    private $filename;

    /**
<<<<<<< HEAD
     * @var LibXMLError[]
=======
     * @var \LibXMLError[]
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $errors = [];

    /**
     * Returns a PHPUnit configuration object.
     *
     * @throws Exception
     */
    public static function getInstance(string $filename): self
    {
<<<<<<< HEAD
        $realPath = realpath($filename);

        if ($realPath === false) {
            throw new Exception(
                sprintf(
=======
        $realPath = \realpath($filename);

        if ($realPath === false) {
            throw new Exception(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Could not read "%s".',
                    $filename
                )
            );
        }

        if (!isset(self::$instances[$realPath])) {
            self::$instances[$realPath] = new self($realPath);
        }

        return self::$instances[$realPath];
    }

    /**
     * Loads a PHPUnit configuration file.
     *
     * @throws Exception
     */
    private function __construct(string $filename)
    {
        $this->filename = $filename;
        $this->document = Xml::loadFile($filename, false, true, true);
        $this->xpath    = new DOMXPath($this->document);

        $this->validateConfigurationAgainstSchema();
    }

    /**
     * @codeCoverageIgnore
     */
    private function __clone()
    {
    }

    public function hasValidationErrors(): bool
    {
<<<<<<< HEAD
        return count($this->errors) > 0;
=======
        return \count($this->errors) > 0;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getValidationErrors(): array
    {
        $result = [];

        foreach ($this->errors as $error) {
            if (!isset($result[$error->line])) {
                $result[$error->line] = [];
            }
<<<<<<< HEAD
            $result[$error->line][] = trim($error->message);
=======
            $result[$error->line][] = \trim($error->message);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $result;
    }

    /**
     * Returns the real path to the configuration file.
     */
    public function getFilename(): string
    {
        return $this->filename;
    }

    public function getExtensionConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('extensions/extension') as $extension) {
            $result[] = $this->getElementConfigurationParameters($extension);
        }

        return $result;
    }

    /**
     * Returns the configuration for SUT filtering.
     */
    public function getFilterConfiguration(): array
    {
        $addUncoveredFilesFromWhitelist     = true;
        $processUncoveredFilesFromWhitelist = false;
        $includeDirectory                   = [];
        $includeFile                        = [];
        $excludeDirectory                   = [];
        $excludeFile                        = [];

        $tmp = $this->xpath->query('filter/whitelist');

        if ($tmp->length === 1) {
            if ($tmp->item(0)->hasAttribute('addUncoveredFilesFromWhitelist')) {
                $addUncoveredFilesFromWhitelist = $this->getBoolean(
                    (string) $tmp->item(0)->getAttribute(
                        'addUncoveredFilesFromWhitelist'
                    ),
                    true
                );
            }

            if ($tmp->item(0)->hasAttribute('processUncoveredFilesFromWhitelist')) {
                $processUncoveredFilesFromWhitelist = $this->getBoolean(
                    (string) $tmp->item(0)->getAttribute(
                        'processUncoveredFilesFromWhitelist'
                    ),
                    false
                );
            }

            $includeDirectory = $this->readFilterDirectories(
                'filter/whitelist/directory'
            );

            $includeFile = $this->readFilterFiles(
                'filter/whitelist/file'
            );

            $excludeDirectory = $this->readFilterDirectories(
                'filter/whitelist/exclude/directory'
            );

            $excludeFile = $this->readFilterFiles(
                'filter/whitelist/exclude/file'
            );
        }

        return [
            'whitelist' => [
                'addUncoveredFilesFromWhitelist'     => $addUncoveredFilesFromWhitelist,
                'processUncoveredFilesFromWhitelist' => $processUncoveredFilesFromWhitelist,
                'include'                            => [
                    'directory' => $includeDirectory,
                    'file'      => $includeFile,
                ],
                'exclude' => [
                    'directory' => $excludeDirectory,
                    'file'      => $excludeFile,
                ],
            ],
        ];
    }

    /**
     * Returns the configuration for groups.
     */
    public function getGroupConfiguration(): array
    {
        return $this->parseGroupConfiguration('groups');
    }

    /**
     * Returns the configuration for testdox groups.
     */
    public function getTestdoxGroupConfiguration(): array
    {
        return $this->parseGroupConfiguration('testdoxGroups');
    }

    /**
     * Returns the configuration for listeners.
     */
    public function getListenerConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('listeners/listener') as $listener) {
            $result[] = $this->getElementConfigurationParameters($listener);
        }

        return $result;
    }

    /**
     * Returns the logging configuration.
     */
    public function getLoggingConfiguration(): array
    {
        $result = [];

        foreach ($this->xpath->query('logging/log') as $log) {
<<<<<<< HEAD
            assert($log instanceof DOMElement);
=======
            \assert($log instanceof DOMElement);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $type   = (string) $log->getAttribute('type');
            $target = (string) $log->getAttribute('target');

            if (!$target) {
                continue;
            }

            $target = $this->toAbsolutePath($target);

            if ($type === 'coverage-html') {
                if ($log->hasAttribute('lowUpperBound')) {
                    $result['lowUpperBound'] = $this->getInteger(
                        (string) $log->getAttribute('lowUpperBound'),
                        50
                    );
                }

                if ($log->hasAttribute('highLowerBound')) {
                    $result['highLowerBound'] = $this->getInteger(
                        (string) $log->getAttribute('highLowerBound'),
                        90
                    );
                }
            } elseif ($type === 'coverage-crap4j') {
                if ($log->hasAttribute('threshold')) {
                    $result['crap4jThreshold'] = $this->getInteger(
                        (string) $log->getAttribute('threshold'),
                        30
                    );
                }
            } elseif ($type === 'coverage-text') {
                if ($log->hasAttribute('showUncoveredFiles')) {
                    $result['coverageTextShowUncoveredFiles'] = $this->getBoolean(
                        (string) $log->getAttribute('showUncoveredFiles'),
                        false
                    );
                }

                if ($log->hasAttribute('showOnlySummary')) {
                    $result['coverageTextShowOnlySummary'] = $this->getBoolean(
                        (string) $log->getAttribute('showOnlySummary'),
                        false
                    );
                }
            }

            $result[$type] = $target;
        }

        return $result;
    }

    /**
     * Returns the PHP configuration.
     */
    public function getPHPConfiguration(): array
    {
        $result = [
            'include_path' => [],
            'ini'          => [],
            'const'        => [],
            'var'          => [],
            'env'          => [],
            'post'         => [],
            'get'          => [],
            'cookie'       => [],
            'server'       => [],
            'files'        => [],
            'request'      => [],
        ];

        foreach ($this->xpath->query('php/includePath') as $includePath) {
<<<<<<< HEAD
            assert($includePath instanceof DOMNode);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $path = (string) $includePath->textContent;

            if ($path) {
                $result['include_path'][] = $this->toAbsolutePath($path);
            }
        }

        foreach ($this->xpath->query('php/ini') as $ini) {
<<<<<<< HEAD
            assert($ini instanceof DOMElement);
=======
            \assert($ini instanceof DOMElement);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $name  = (string) $ini->getAttribute('name');
            $value = (string) $ini->getAttribute('value');

            $result['ini'][$name]['value'] = $value;
        }

        foreach ($this->xpath->query('php/const') as $const) {
<<<<<<< HEAD
            assert($const instanceof DOMElement);
=======
            \assert($const instanceof  DOMElement);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $name  = (string) $const->getAttribute('name');
            $value = (string) $const->getAttribute('value');

            $result['const'][$name]['value'] = $this->getBoolean($value, $value);
        }

        foreach (['var', 'env', 'post', 'get', 'cookie', 'server', 'files', 'request'] as $array) {
            foreach ($this->xpath->query('php/' . $array) as $var) {
<<<<<<< HEAD
                assert($var instanceof DOMElement);
=======
                \assert($var instanceof DOMElement);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                $name     = (string) $var->getAttribute('name');
                $value    = (string) $var->getAttribute('value');
                $verbatim = false;

                if ($var->hasAttribute('verbatim')) {
                    $verbatim                          = $this->getBoolean($var->getAttribute('verbatim'), false);
                    $result[$array][$name]['verbatim'] = $verbatim;
                }

                if ($var->hasAttribute('force')) {
                    $force                          = $this->getBoolean($var->getAttribute('force'), false);
                    $result[$array][$name]['force'] = $force;
                }

                if (!$verbatim) {
                    $value = $this->getBoolean($value, $value);
                }

                $result[$array][$name]['value'] = $value;
            }
        }

        return $result;
    }

    /**
     * Handles the PHP configuration.
     */
    public function handlePHPConfiguration(): void
    {
        $configuration = $this->getPHPConfiguration();

        if (!empty($configuration['include_path'])) {
<<<<<<< HEAD
            ini_set(
                'include_path',
                implode(PATH_SEPARATOR, $configuration['include_path']) .
                PATH_SEPARATOR .
                ini_get('include_path')
=======
            \ini_set(
                'include_path',
                \implode(\PATH_SEPARATOR, $configuration['include_path']) .
                \PATH_SEPARATOR .
                \ini_get('include_path')
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        foreach ($configuration['ini'] as $name => $data) {
            $value = $data['value'];

<<<<<<< HEAD
            if (defined($value)) {
                $value = (string) constant($value);
            }

            ini_set($name, $value);
=======
            if (\defined($value)) {
                $value = (string) \constant($value);
            }

            \ini_set($name, $value);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        foreach ($configuration['const'] as $name => $data) {
            $value = $data['value'];

<<<<<<< HEAD
            if (!defined($name)) {
                define($name, $value);
            }
        }

        foreach ($configuration['var'] as $name => $data) {
            $GLOBALS[$name] = $data['value'];
        }

        foreach ($configuration['server'] as $name => $data) {
            $_SERVER[$name] = $data['value'];
        }

        foreach (['post', 'get', 'cookie', 'files', 'request'] as $array) {
            $target = &$GLOBALS['_' . strtoupper($array)];
=======
            if (!\defined($name)) {
                \define($name, $value);
            }
        }

        foreach (['var', 'post', 'get', 'cookie', 'server', 'files', 'request'] as $array) {
            /*
             * @see https://github.com/sebastianbergmann/phpunit/issues/277
             */
            switch ($array) {
                case 'var':
                    $target = &$GLOBALS;

                    break;

                case 'server':
                    $target = &$_SERVER;

                    break;

                default:
                    $target = &$GLOBALS['_' . \strtoupper($array)];

                    break;
            }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            foreach ($configuration[$array] as $name => $data) {
                $target[$name] = $data['value'];
            }
        }

        foreach ($configuration['env'] as $name => $data) {
            $value = $data['value'];
            $force = $data['force'] ?? false;

<<<<<<< HEAD
            if ($force || getenv($name) === false) {
                putenv("{$name}={$value}");
            }

            $value = getenv($name);
=======
            if ($force || \getenv($name) === false) {
                \putenv("{$name}={$value}");
            }

            $value = \getenv($name);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if (!isset($_ENV[$name])) {
                $_ENV[$name] = $value;
            }

            if ($force) {
                $_ENV[$name] = $value;
            }
        }
    }

    /**
     * Returns the PHPUnit configuration.
     */
    public function getPHPUnitConfiguration(): array
    {
        $result = [];
        $root   = $this->document->documentElement;

        if ($root->hasAttribute('cacheTokens')) {
            $result['cacheTokens'] = $this->getBoolean(
                (string) $root->getAttribute('cacheTokens'),
                false
            );
        }

        if ($root->hasAttribute('columns')) {
            $columns = (string) $root->getAttribute('columns');

            if ($columns === 'max') {
                $result['columns'] = 'max';
            } else {
                $result['columns'] = $this->getInteger($columns, 80);
            }
        }

        if ($root->hasAttribute('colors')) {
            /* only allow boolean for compatibility with previous versions
              'always' only allowed from command line */
            if ($this->getBoolean($root->getAttribute('colors'), false)) {
                $result['colors'] = ResultPrinter::COLOR_AUTO;
            } else {
                $result['colors'] = ResultPrinter::COLOR_NEVER;
            }
        }

        /*
         * @see https://github.com/sebastianbergmann/phpunit/issues/657
         */
        if ($root->hasAttribute('stderr')) {
            $result['stderr'] = $this->getBoolean(
                (string) $root->getAttribute('stderr'),
                false
            );
        }

        if ($root->hasAttribute('backupGlobals')) {
            $result['backupGlobals'] = $this->getBoolean(
                (string) $root->getAttribute('backupGlobals'),
                false
            );
        }

        if ($root->hasAttribute('backupStaticAttributes')) {
            $result['backupStaticAttributes'] = $this->getBoolean(
                (string) $root->getAttribute('backupStaticAttributes'),
                false
            );
        }

        if ($root->getAttribute('bootstrap')) {
            $result['bootstrap'] = $this->toAbsolutePath(
                (string) $root->getAttribute('bootstrap')
            );
        }

        if ($root->hasAttribute('convertDeprecationsToExceptions')) {
            $result['convertDeprecationsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertDeprecationsToExceptions'),
<<<<<<< HEAD
                false
=======
                true
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            );
        }

        if ($root->hasAttribute('convertErrorsToExceptions')) {
            $result['convertErrorsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertErrorsToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('convertNoticesToExceptions')) {
            $result['convertNoticesToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertNoticesToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('convertWarningsToExceptions')) {
            $result['convertWarningsToExceptions'] = $this->getBoolean(
                (string) $root->getAttribute('convertWarningsToExceptions'),
                true
            );
        }

        if ($root->hasAttribute('forceCoversAnnotation')) {
            $result['forceCoversAnnotation'] = $this->getBoolean(
                (string) $root->getAttribute('forceCoversAnnotation'),
                false
            );
        }

        if ($root->hasAttribute('disableCodeCoverageIgnore')) {
            $result['disableCodeCoverageIgnore'] = $this->getBoolean(
                (string) $root->getAttribute('disableCodeCoverageIgnore'),
                false
            );
        }

        if ($root->hasAttribute('processIsolation')) {
            $result['processIsolation'] = $this->getBoolean(
                (string) $root->getAttribute('processIsolation'),
                false
            );
        }

        if ($root->hasAttribute('stopOnDefect')) {
            $result['stopOnDefect'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnDefect'),
                false
            );
        }

        if ($root->hasAttribute('stopOnError')) {
            $result['stopOnError'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnError'),
                false
            );
        }

        if ($root->hasAttribute('stopOnFailure')) {
            $result['stopOnFailure'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnFailure'),
                false
            );
        }

        if ($root->hasAttribute('stopOnWarning')) {
            $result['stopOnWarning'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnWarning'),
                false
            );
        }

        if ($root->hasAttribute('stopOnIncomplete')) {
            $result['stopOnIncomplete'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnIncomplete'),
                false
            );
        }

        if ($root->hasAttribute('stopOnRisky')) {
            $result['stopOnRisky'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnRisky'),
                false
            );
        }

        if ($root->hasAttribute('stopOnSkipped')) {
            $result['stopOnSkipped'] = $this->getBoolean(
                (string) $root->getAttribute('stopOnSkipped'),
                false
            );
        }

        if ($root->hasAttribute('failOnWarning')) {
            $result['failOnWarning'] = $this->getBoolean(
                (string) $root->getAttribute('failOnWarning'),
                false
            );
        }

        if ($root->hasAttribute('failOnRisky')) {
            $result['failOnRisky'] = $this->getBoolean(
                (string) $root->getAttribute('failOnRisky'),
                false
            );
        }

        if ($root->hasAttribute('testSuiteLoaderClass')) {
            $result['testSuiteLoaderClass'] = (string) $root->getAttribute(
                'testSuiteLoaderClass'
            );
        }

        if ($root->hasAttribute('defaultTestSuite')) {
            $result['defaultTestSuite'] = (string) $root->getAttribute(
                'defaultTestSuite'
            );
        }

        if ($root->getAttribute('testSuiteLoaderFile')) {
            $result['testSuiteLoaderFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('testSuiteLoaderFile')
            );
        }

        if ($root->hasAttribute('printerClass')) {
            $result['printerClass'] = (string) $root->getAttribute(
                'printerClass'
            );
        }

        if ($root->getAttribute('printerFile')) {
            $result['printerFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('printerFile')
            );
        }

        if ($root->hasAttribute('beStrictAboutChangesToGlobalState')) {
            $result['beStrictAboutChangesToGlobalState'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutChangesToGlobalState'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutOutputDuringTests')) {
            $result['disallowTestOutput'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutOutputDuringTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutResourceUsageDuringSmallTests')) {
            $result['beStrictAboutResourceUsageDuringSmallTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutResourceUsageDuringSmallTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutTestsThatDoNotTestAnything')) {
            $result['reportUselessTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTestsThatDoNotTestAnything'),
                true
            );
        }

        if ($root->hasAttribute('beStrictAboutTodoAnnotatedTests')) {
            $result['disallowTodoAnnotatedTests'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutTodoAnnotatedTests'),
                false
            );
        }

        if ($root->hasAttribute('beStrictAboutCoversAnnotation')) {
            $result['strictCoverage'] = $this->getBoolean(
                (string) $root->getAttribute('beStrictAboutCoversAnnotation'),
                false
            );
        }

        if ($root->hasAttribute('defaultTimeLimit')) {
            $result['defaultTimeLimit'] = $this->getInteger(
                (string) $root->getAttribute('defaultTimeLimit'),
                1
            );
        }

        if ($root->hasAttribute('enforceTimeLimit')) {
            $result['enforceTimeLimit'] = $this->getBoolean(
                (string) $root->getAttribute('enforceTimeLimit'),
                false
            );
        }

        if ($root->hasAttribute('ignoreDeprecatedCodeUnitsFromCodeCoverage')) {
            $result['ignoreDeprecatedCodeUnitsFromCodeCoverage'] = $this->getBoolean(
                (string) $root->getAttribute('ignoreDeprecatedCodeUnitsFromCodeCoverage'),
                false
            );
        }

        if ($root->hasAttribute('timeoutForSmallTests')) {
            $result['timeoutForSmallTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForSmallTests'),
                1
            );
        }

        if ($root->hasAttribute('timeoutForMediumTests')) {
            $result['timeoutForMediumTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForMediumTests'),
                10
            );
        }

        if ($root->hasAttribute('timeoutForLargeTests')) {
            $result['timeoutForLargeTests'] = $this->getInteger(
                (string) $root->getAttribute('timeoutForLargeTests'),
                60
            );
        }

        if ($root->hasAttribute('reverseDefectList')) {
            $result['reverseDefectList'] = $this->getBoolean(
                (string) $root->getAttribute('reverseDefectList'),
                false
            );
        }

        if ($root->hasAttribute('verbose')) {
            $result['verbose'] = $this->getBoolean(
                (string) $root->getAttribute('verbose'),
                false
            );
        }

        if ($root->hasAttribute('testdox')) {
            $testdox = $this->getBoolean(
                (string) $root->getAttribute('testdox'),
                false
            );

            if ($testdox) {
                if (isset($result['printerClass'])) {
                    $result['conflictBetweenPrinterClassAndTestdox'] = true;
                } else {
                    $result['printerClass'] = CliTestDoxPrinter::class;
                }
            }
        }

        if ($root->hasAttribute('registerMockObjectsFromTestArgumentsRecursively')) {
            $result['registerMockObjectsFromTestArgumentsRecursively'] = $this->getBoolean(
                (string) $root->getAttribute('registerMockObjectsFromTestArgumentsRecursively'),
                false
            );
        }

        if ($root->hasAttribute('extensionsDirectory')) {
            $result['extensionsDirectory'] = $this->toAbsolutePath(
                (string) $root->getAttribute(
                    'extensionsDirectory'
                )
            );
        }

        if ($root->hasAttribute('cacheResult')) {
            $result['cacheResult'] = $this->getBoolean(
                (string) $root->getAttribute('cacheResult'),
                true
            );
        }

        if ($root->hasAttribute('cacheResultFile')) {
            $result['cacheResultFile'] = $this->toAbsolutePath(
                (string) $root->getAttribute('cacheResultFile')
            );
        }

        if ($root->hasAttribute('executionOrder')) {
<<<<<<< HEAD
            foreach (explode(',', $root->getAttribute('executionOrder')) as $order) {
=======
            foreach (\explode(',', $root->getAttribute('executionOrder')) as $order) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                switch ($order) {
                    case 'default':
                        $result['executionOrder']        = TestSuiteSorter::ORDER_DEFAULT;
                        $result['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFAULT;
                        $result['resolveDependencies']   = false;

                        break;

                    case 'defects':
                        $result['executionOrderDefects'] = TestSuiteSorter::ORDER_DEFECTS_FIRST;

                        break;

                    case 'depends':
                        $result['resolveDependencies'] = true;

                        break;

                    case 'duration':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_DURATION;

                        break;

                    case 'no-depends':
                        $result['resolveDependencies'] = false;

                        break;

                    case 'random':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_RANDOMIZED;

                        break;

                    case 'reverse':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_REVERSED;

                        break;

                    case 'size':
                        $result['executionOrder'] = TestSuiteSorter::ORDER_SIZE;

                        break;
                }
            }
        }

        if ($root->hasAttribute('resolveDependencies')) {
            $result['resolveDependencies'] = $this->getBoolean(
                (string) $root->getAttribute('resolveDependencies'),
                false
            );
        }

        if ($root->hasAttribute('noInteraction')) {
            $result['noInteraction'] = $this->getBoolean(
                (string) $root->getAttribute('noInteraction'),
                false
            );
        }

        return $result;
    }

    /**
     * Returns the test suite configuration.
     *
     * @throws Exception
     */
    public function getTestSuiteConfiguration(string $testSuiteFilter = ''): TestSuite
    {
        $testSuiteNodes = $this->xpath->query('testsuites/testsuite');

        if ($testSuiteNodes->length === 0) {
            $testSuiteNodes = $this->xpath->query('testsuite');
        }

        if ($testSuiteNodes->length === 1) {
            return $this->getTestSuite($testSuiteNodes->item(0), $testSuiteFilter);
        }

        $suite = new TestSuite;

        foreach ($testSuiteNodes as $testSuiteNode) {
            $suite->addTestSuite(
                $this->getTestSuite($testSuiteNode, $testSuiteFilter)
            );
        }

        return $suite;
    }

    /**
     * Returns the test suite names from the configuration.
     */
    public function getTestSuiteNames(): array
    {
        $names = [];

        foreach ($this->xpath->query('*/testsuite') as $node) {
            /* @var DOMElement $node */
            $names[] = $node->getAttribute('name');
        }

        return $names;
    }

    private function validateConfigurationAgainstSchema(): void
    {
<<<<<<< HEAD
        $original    = libxml_use_internal_errors(true);
        $xsdFilename = __DIR__ . '/../../phpunit.xsd';

        if (defined('__PHPUNIT_PHAR_ROOT__')) {
            $xsdFilename = __PHPUNIT_PHAR_ROOT__ . '/phpunit.xsd';
        }

        $this->document->schemaValidateSource(file_get_contents($xsdFilename));
        $this->errors = libxml_get_errors();
        libxml_clear_errors();
        libxml_use_internal_errors($original);
=======
        $original    = \libxml_use_internal_errors(true);
        $xsdFilename = __DIR__ . '/../../phpunit.xsd';

        if (\defined('__PHPUNIT_PHAR_ROOT__')) {
            $xsdFilename =  __PHPUNIT_PHAR_ROOT__ . '/phpunit.xsd';
        }

        $this->document->schemaValidate($xsdFilename);
        $this->errors = \libxml_get_errors();
        \libxml_clear_errors();
        \libxml_use_internal_errors($original);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Collects and returns the configuration arguments from the PHPUnit
<<<<<<< HEAD
     * XML configuration.
     */
    private function getConfigurationArguments(DOMNodeList $nodes): array
=======
     * XML configuration
     */
    private function getConfigurationArguments(\DOMNodeList $nodes): array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $arguments = [];

        if ($nodes->length === 0) {
            return $arguments;
        }

        foreach ($nodes as $node) {
            if (!$node instanceof DOMElement) {
                continue;
            }

            if ($node->tagName !== 'arguments') {
                continue;
            }

            foreach ($node->childNodes as $argument) {
                if (!$argument instanceof DOMElement) {
                    continue;
                }

                if ($argument->tagName === 'file' || $argument->tagName === 'directory') {
                    $arguments[] = $this->toAbsolutePath((string) $argument->textContent);
                } else {
                    $arguments[] = Xml::xmlToVariable($argument);
                }
            }
        }

        return $arguments;
    }

    /**
<<<<<<< HEAD
     * @throws Exception
=======
     * @throws \PHPUnit\Framework\Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function getTestSuite(DOMElement $testSuiteNode, string $testSuiteFilter = ''): TestSuite
    {
        if ($testSuiteNode->hasAttribute('name')) {
            $suite = new TestSuite(
                (string) $testSuiteNode->getAttribute('name')
            );
        } else {
            $suite = new TestSuite;
        }

        $exclude = [];

        foreach ($testSuiteNode->getElementsByTagName('exclude') as $excludeNode) {
            $excludeFile = (string) $excludeNode->textContent;

            if ($excludeFile) {
                $exclude[] = $this->toAbsolutePath($excludeFile);
            }
        }

        $fileIteratorFacade = new FileIteratorFacade;
<<<<<<< HEAD
        $testSuiteFilter    = $testSuiteFilter ? explode(',', $testSuiteFilter) : [];

        foreach ($testSuiteNode->getElementsByTagName('directory') as $directoryNode) {
            assert($directoryNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !in_array($directoryNode->parentNode->getAttribute('name'), $testSuiteFilter, true)) {
=======
        $testSuiteFilter    = $testSuiteFilter ? \explode(',', $testSuiteFilter) : [];

        foreach ($testSuiteNode->getElementsByTagName('directory') as $directoryNode) {
            \assert($directoryNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !\in_array($directoryNode->parentNode->getAttribute('name'), $testSuiteFilter)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            $directory = (string) $directoryNode->textContent;

            if (empty($directory)) {
                continue;
            }

            if (!$this->satisfiesPhpVersion($directoryNode)) {
                continue;
            }

            $files = $fileIteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($directory),
                $directoryNode->hasAttribute('suffix') ? (string) $directoryNode->getAttribute('suffix') : 'Test.php',
                $directoryNode->hasAttribute('prefix') ? (string) $directoryNode->getAttribute('prefix') : '',
                $exclude
            );

            $suite->addTestFiles($files);
        }

        foreach ($testSuiteNode->getElementsByTagName('file') as $fileNode) {
<<<<<<< HEAD
            assert($fileNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !in_array($fileNode->parentNode->getAttribute('name'), $testSuiteFilter, true)) {
=======
            \assert($fileNode instanceof DOMElement);

            if (!empty($testSuiteFilter) && !\in_array($fileNode->parentNode->getAttribute('name'), $testSuiteFilter)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                continue;
            }

            $file = (string) $fileNode->textContent;

            if (empty($file)) {
                continue;
            }

            $file = $fileIteratorFacade->getFilesAsArray(
                $this->toAbsolutePath($file)
            );

            if (!isset($file[0])) {
                continue;
            }

            $file = $file[0];

            if (!$this->satisfiesPhpVersion($fileNode)) {
                continue;
            }

            $suite->addTestFile($file);
        }

        return $suite;
    }

    private function satisfiesPhpVersion(DOMElement $node): bool
    {
<<<<<<< HEAD
        $phpVersion         = PHP_VERSION;
=======
        $phpVersion         = \PHP_VERSION;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $phpVersionOperator = '>=';

        if ($node->hasAttribute('phpVersion')) {
            $phpVersion = (string) $node->getAttribute('phpVersion');
        }

        if ($node->hasAttribute('phpVersionOperator')) {
            $phpVersionOperator = (string) $node->getAttribute('phpVersionOperator');
        }

<<<<<<< HEAD
        return version_compare(PHP_VERSION, $phpVersion, (new VersionComparisonOperator($phpVersionOperator))->asString());
=======
        return \version_compare(\PHP_VERSION, $phpVersion, (new VersionComparisonOperator($phpVersionOperator))->asString());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * if $value is 'false' or 'true', this returns the value that $value represents.
     * Otherwise, returns $default, which may be a string in rare cases.
<<<<<<< HEAD
     * See PHPUnit\Util\ConfigurationTest::testPHPConfigurationIsReadCorrectly.
=======
     * See PHPUnit\Util\ConfigurationTest::testPHPConfigurationIsReadCorrectly
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @param bool|string $default
     *
     * @return bool|string
     */
    private function getBoolean(string $value, $default)
    {
<<<<<<< HEAD
        if (strtolower($value) === 'false') {
            return false;
        }

        if (strtolower($value) === 'true') {
=======
        if (\strtolower($value) === 'false') {
            return false;
        }

        if (\strtolower($value) === 'true') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return true;
        }

        return $default;
    }

    private function getInteger(string $value, int $default): int
    {
<<<<<<< HEAD
        if (is_numeric($value)) {
=======
        if (\is_numeric($value)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return (int) $value;
        }

        return $default;
    }

    private function readFilterDirectories(string $query): array
    {
        $directories = [];

        foreach ($this->xpath->query($query) as $directoryNode) {
<<<<<<< HEAD
            assert($directoryNode instanceof DOMElement);
=======
            \assert($directoryNode instanceof DOMElement);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $directoryPath = (string) $directoryNode->textContent;

            if (!$directoryPath) {
                continue;
            }

            $directories[] = [
                'path'   => $this->toAbsolutePath($directoryPath),
                'prefix' => $directoryNode->hasAttribute('prefix') ? (string) $directoryNode->getAttribute('prefix') : '',
                'suffix' => $directoryNode->hasAttribute('suffix') ? (string) $directoryNode->getAttribute('suffix') : '.php',
                'group'  => $directoryNode->hasAttribute('group') ? (string) $directoryNode->getAttribute('group') : 'DEFAULT',
            ];
        }

        return $directories;
    }

    /**
     * @return string[]
     */
    private function readFilterFiles(string $query): array
    {
        $files = [];

        foreach ($this->xpath->query($query) as $file) {
<<<<<<< HEAD
            assert($file instanceof DOMNode);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $filePath = (string) $file->textContent;

            if ($filePath) {
                $files[] = $this->toAbsolutePath($filePath);
            }
        }

        return $files;
    }

    private function toAbsolutePath(string $path, bool $useIncludePath = false): string
    {
<<<<<<< HEAD
        $path = trim($path);

        if (strpos($path, '/') === 0) {
=======
        $path = \trim($path);

        if (\strpos($path, '/') === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return $path;
        }

        // Matches the following on Windows:
        //  - \\NetworkComputer\Path
        //  - \\.\D:
        //  - \\.\c:
        //  - C:\Windows
        //  - C:\windows
        //  - C:/windows
        //  - c:/windows
<<<<<<< HEAD
        if (defined('PHP_WINDOWS_VERSION_BUILD') &&
            ($path[0] === '\\' || (strlen($path) >= 3 && preg_match('#^[A-Z]\:[/\\\]#i', substr($path, 0, 3))))) {
            return $path;
        }

        if (strpos($path, '://') !== false) {
            return $path;
        }

        $file = dirname($this->filename) . DIRECTORY_SEPARATOR . $path;

        if ($useIncludePath && !file_exists($file)) {
            $includePathFile = stream_resolve_include_path($path);
=======
        if (\defined('PHP_WINDOWS_VERSION_BUILD') &&
            ($path[0] === '\\' || (\strlen($path) >= 3 && \preg_match('#^[A-Z]\:[/\\\]#i', \substr($path, 0, 3))))) {
            return $path;
        }

        if (\strpos($path, '://') !== false) {
            return $path;
        }

        $file = \dirname($this->filename) . \DIRECTORY_SEPARATOR . $path;

        if ($useIncludePath && !\file_exists($file)) {
            $includePathFile = \stream_resolve_include_path($path);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if ($includePathFile) {
                $file = $includePathFile;
            }
        }

        return $file;
    }

    private function parseGroupConfiguration(string $root): array
    {
        $groups = [
            'include' => [],
            'exclude' => [],
        ];

        foreach ($this->xpath->query($root . '/include/group') as $group) {
<<<<<<< HEAD
            assert($group instanceof DOMNode);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $groups['include'][] = (string) $group->textContent;
        }

        foreach ($this->xpath->query($root . '/exclude/group') as $group) {
<<<<<<< HEAD
            assert($group instanceof DOMNode);

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $groups['exclude'][] = (string) $group->textContent;
        }

        return $groups;
    }

    private function getElementConfigurationParameters(DOMElement $element): array
    {
        $class     = (string) $element->getAttribute('class');
        $file      = '';
        $arguments = $this->getConfigurationArguments($element->childNodes);

        if ($element->getAttribute('file')) {
            $file = $this->toAbsolutePath(
                (string) $element->getAttribute('file'),
                true
            );
        }

        return [
            'class'     => $class,
            'file'      => $file,
            'arguments' => $arguments,
        ];
    }
}
