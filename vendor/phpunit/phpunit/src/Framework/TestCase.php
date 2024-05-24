<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Framework;

<<<<<<< HEAD
use const LC_ALL;
use const LC_COLLATE;
use const LC_CTYPE;
use const LC_MESSAGES;
use const LC_MONETARY;
use const LC_NUMERIC;
use const LC_TIME;
use const PATHINFO_FILENAME;
use const PHP_EOL;
use const PHP_URL_PATH;
use function array_filter;
use function array_flip;
use function array_keys;
use function array_merge;
use function array_unique;
use function array_values;
use function assert;
use function basename;
use function call_user_func;
use function chdir;
use function class_exists;
use function clearstatcache;
use function count;
use function defined;
use function explode;
use function get_class;
use function get_include_path;
use function getcwd;
use function implode;
use function in_array;
use function ini_set;
use function is_array;
use function is_int;
use function is_object;
use function is_string;
use function libxml_clear_errors;
use function method_exists;
use function ob_end_clean;
use function ob_get_contents;
use function ob_get_level;
use function ob_start;
use function parse_url;
use function pathinfo;
use function preg_replace;
use function serialize;
use function setlocale;
use function sprintf;
use function strlen;
use function strpos;
use function substr;
use function sys_get_temp_dir;
use function tempnam;
use function trim;
use function var_export;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use DeepCopy\DeepCopy;
use PHPUnit\Framework\Constraint\Exception as ExceptionConstraint;
use PHPUnit\Framework\Constraint\ExceptionCode;
use PHPUnit\Framework\Constraint\ExceptionMessage;
use PHPUnit\Framework\Constraint\ExceptionMessageRegularExpression;
<<<<<<< HEAD
use PHPUnit\Framework\Constraint\LogicalOr;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Error\Deprecated;
use PHPUnit\Framework\Error\Error;
use PHPUnit\Framework\Error\Notice;
use PHPUnit\Framework\Error\Warning as WarningError;
use PHPUnit\Framework\MockObject\Generator as MockGenerator;
use PHPUnit\Framework\MockObject\MockBuilder;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
use PHPUnit\Framework\MockObject\Stub;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;
use PHPUnit\Runner\BaseTestRunner;
use PHPUnit\Runner\PhptTestCase;
use PHPUnit\Util\Exception as UtilException;
use PHPUnit\Util\GlobalState;
use PHPUnit\Util\PHP\AbstractPhpProcess;
use PHPUnit\Util\Test as TestUtil;
use PHPUnit\Util\Type;
<<<<<<< HEAD
use Prophecy\Exception\Doubler\ClassNotFoundException;
use Prophecy\Exception\Doubler\DoubleException;
use Prophecy\Exception\Doubler\InterfaceNotFoundException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Prophecy\Exception\Prediction\PredictionException;
use Prophecy\Prophecy\MethodProphecy;
use Prophecy\Prophecy\ObjectProphecy;
use Prophecy\Prophet;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException;
use SebastianBergmann\CodeCoverage\MissingCoversAnnotationException;
use SebastianBergmann\CodeCoverage\RuntimeException;
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Comparator\Factory as ComparatorFactory;
use SebastianBergmann\Diff\Differ;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\GlobalState\Blacklist;
use SebastianBergmann\GlobalState\Restorer;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\ObjectEnumerator\Enumerator;
<<<<<<< HEAD
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Text_Template;
use Throwable;

abstract class TestCase extends Assert implements SelfDescribing, Test
{
    private const LOCALE_CATEGORIES = [LC_ALL, LC_COLLATE, LC_CTYPE, LC_MONETARY, LC_NUMERIC, LC_TIME];
=======

abstract class TestCase extends Assert implements SelfDescribing, Test
{
    private const LOCALE_CATEGORIES = [\LC_ALL, \LC_COLLATE, \LC_CTYPE, \LC_MONETARY, \LC_NUMERIC, \LC_TIME];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * @var ?bool
     */
    protected $backupGlobals;

    /**
     * @var string[]
     */
    protected $backupGlobalsBlacklist = [];

    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $backupStaticAttributes;

    /**
     * @var array<string,array<int,string>>
     */
    protected $backupStaticAttributesBlacklist = [];

    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $runTestInSeparateProcess;

    /**
     * @var bool
     */
    protected $preserveGlobalState = true;

    /**
<<<<<<< HEAD
     * @var ?bool
=======
     * @var bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $runClassInSeparateProcess;

    /**
     * @var bool
     */
    private $inIsolation = false;

    /**
     * @var array
     */
    private $data;

    /**
     * @var string
     */
    private $dataName;

    /**
<<<<<<< HEAD
     * @var ?string
=======
     * @var null|string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $expectedException;

    /**
<<<<<<< HEAD
     * @var ?string
=======
     * @var null|string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $expectedExceptionMessage;

    /**
<<<<<<< HEAD
     * @var ?string
=======
     * @var null|string
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $expectedExceptionMessageRegExp;

    /**
     * @var null|int|string
     */
    private $expectedExceptionCode;

    /**
     * @var string
     */
    private $name = '';

    /**
     * @var string[]
     */
    private $dependencies = [];

    /**
     * @var array
     */
    private $dependencyInput = [];

    /**
     * @var array<string,string>
     */
    private $iniSettings = [];

    /**
     * @var array
     */
    private $locale = [];

    /**
     * @var MockObject[]
     */
    private $mockObjects = [];

    /**
     * @var MockGenerator
     */
    private $mockObjectGenerator;

    /**
     * @var int
     */
    private $status = BaseTestRunner::STATUS_UNKNOWN;

    /**
     * @var string
     */
    private $statusMessage = '';

    /**
     * @var int
     */
    private $numAssertions = 0;

    /**
     * @var TestResult
     */
    private $result;

    /**
     * @var mixed
     */
    private $testResult;

    /**
     * @var string
     */
    private $output = '';

    /**
     * @var string
     */
    private $outputExpectedRegex;

    /**
     * @var string
     */
    private $outputExpectedString;

    /**
     * @var mixed
     */
    private $outputCallback = false;

    /**
     * @var bool
     */
    private $outputBufferingActive = false;

    /**
     * @var int
     */
    private $outputBufferingLevel;

    /**
     * @var bool
     */
    private $outputRetrievedForAssertion = false;

    /**
     * @var Snapshot
     */
    private $snapshot;

    /**
<<<<<<< HEAD
     * @var Prophet
=======
     * @var \Prophecy\Prophet
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $prophet;

    /**
     * @var bool
     */
    private $beStrictAboutChangesToGlobalState = false;

    /**
     * @var bool
     */
    private $registerMockObjectsFromTestArgumentsRecursively = false;

    /**
     * @var string[]
     */
    private $warnings = [];

    /**
     * @var string[]
     */
    private $groups = [];

    /**
     * @var bool
     */
    private $doesNotPerformAssertions = false;

    /**
     * @var Comparator[]
     */
    private $customComparators = [];

    /**
     * @var string[]
     */
    private $doubledTypes = [];

    /**
     * @var bool
     */
    private $deprecatedExpectExceptionMessageRegExpUsed = false;

    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    public static function any(): AnyInvokedCountMatcher
    {
        return new AnyInvokedCountMatcher;
    }

    /**
     * Returns a matcher that matches when the method is never executed.
     */
    public static function never(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(0);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    public static function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
    {
        return new InvokedAtLeastCountMatcher(
            $requiredInvocations
        );
    }

    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    public static function atLeastOnce(): InvokedAtLeastOnceMatcher
    {
        return new InvokedAtLeastOnceMatcher;
    }

    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    public static function once(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(1);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    public static function exactly(int $count): InvokedCountMatcher
    {
        return new InvokedCountMatcher($count);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    public static function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
    }

    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     */
    public static function at(int $index): InvokedAtIndexMatcher
    {
        return new InvokedAtIndexMatcher($index);
    }

    public static function returnValue($value): ReturnStub
    {
        return new ReturnStub($value);
    }

    public static function returnValueMap(array $valueMap): ReturnValueMapStub
    {
        return new ReturnValueMapStub($valueMap);
    }

    public static function returnArgument(int $argumentIndex): ReturnArgumentStub
    {
        return new ReturnArgumentStub($argumentIndex);
    }

    public static function returnCallback($callback): ReturnCallbackStub
    {
        return new ReturnCallbackStub($callback);
    }

    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     */
    public static function returnSelf(): ReturnSelfStub
    {
        return new ReturnSelfStub;
    }

<<<<<<< HEAD
    public static function throwException(Throwable $exception): ExceptionStub
=======
    public static function throwException(\Throwable $exception): ExceptionStub
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return new ExceptionStub($exception);
    }

    public static function onConsecutiveCalls(...$args): ConsecutiveCallsStub
    {
        return new ConsecutiveCallsStub($args);
    }

    /**
     * @param string $name
     * @param string $dataName
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function __construct($name = null, array $data = [], $dataName = '')
    {
        if ($name !== null) {
            $this->setName($name);
        }

        $this->data     = $data;
        $this->dataName = $dataName;
    }

    /**
     * This method is called before the first test of this test class is run.
     */
    public static function setUpBeforeClass(): void
    {
    }

    /**
     * This method is called after the last test of this test class is run.
     */
    public static function tearDownAfterClass(): void
    {
    }

    /**
     * This method is called before each test.
     */
    protected function setUp(): void
    {
    }

    /**
<<<<<<< HEAD
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    protected function assertPreConditions(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
     */
    protected function assertPostConditions(): void
    {
    }

    /**
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * This method is called after each test.
     */
    protected function tearDown(): void
    {
    }

    /**
     * Returns a string representation of the test case.
     *
<<<<<<< HEAD
     * @throws Exception
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function toString(): string
    {
        try {
<<<<<<< HEAD
            $class = new ReflectionClass($this);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
=======
            $class = new \ReflectionClass($this);
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

<<<<<<< HEAD
        $buffer = sprintf(
=======
        $buffer = \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            '%s::%s',
            $class->name,
            $this->getName(false)
        );

        return $buffer . $this->getDataSetAsString();
    }

    public function count(): int
    {
        return 1;
    }

    public function getActualOutputForAssertion(): string
    {
        $this->outputRetrievedForAssertion = true;

        return $this->getActualOutput();
    }

    public function expectOutputRegex(string $expectedRegex): void
    {
        $this->outputExpectedRegex = $expectedRegex;
    }

    public function expectOutputString(string $expectedString): void
    {
        $this->outputExpectedString = $expectedString;
    }

    /**
     * @psalm-param class-string<\Throwable> $exception
     */
    public function expectException(string $exception): void
    {
        $this->expectedException = $exception;
    }

    /**
     * @param int|string $code
     */
    public function expectExceptionCode($code): void
    {
        $this->expectedExceptionCode = $code;
    }

    public function expectExceptionMessage(string $message): void
    {
        $this->expectedExceptionMessage = $message;
    }

    public function expectExceptionMessageMatches(string $regularExpression): void
    {
        $this->expectedExceptionMessageRegExp = $regularExpression;
    }

    /**
     * @deprecated Use expectExceptionMessageMatches() instead
     */
    public function expectExceptionMessageRegExp(string $regularExpression): void
    {
        $this->deprecatedExpectExceptionMessageRegExpUsed = true;

        $this->expectExceptionMessageMatches($regularExpression);
    }

    /**
     * Sets up an expectation for an exception to be raised by the code under test.
     * Information for expected exception class, expected exception message, and
     * expected exception code are retrieved from a given Exception object.
     */
    public function expectExceptionObject(\Exception $exception): void
    {
<<<<<<< HEAD
        $this->expectException(get_class($exception));
=======
        $this->expectException(\get_class($exception));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->expectExceptionMessage($exception->getMessage());
        $this->expectExceptionCode($exception->getCode());
    }

    public function expectNotToPerformAssertions(): void
    {
        $this->doesNotPerformAssertions = true;
    }

    public function expectDeprecation(): void
    {
        $this->expectException(Deprecated::class);
    }

    public function expectDeprecationMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectDeprecationMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectNotice(): void
    {
        $this->expectException(Notice::class);
    }

    public function expectNoticeMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectNoticeMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectWarning(): void
    {
        $this->expectException(WarningError::class);
    }

    public function expectWarningMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectWarningMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function expectError(): void
    {
        $this->expectException(Error::class);
    }

    public function expectErrorMessage(string $message): void
    {
        $this->expectExceptionMessage($message);
    }

    public function expectErrorMessageMatches(string $regularExpression): void
    {
        $this->expectExceptionMessageMatches($regularExpression);
    }

    public function getStatus(): int
    {
        return $this->status;
    }

    public function markAsRisky(): void
    {
        $this->status = BaseTestRunner::STATUS_RISKY;
    }

    public function getStatusMessage(): string
    {
        return $this->statusMessage;
    }

    public function hasFailed(): bool
    {
        $status = $this->getStatus();

        return $status === BaseTestRunner::STATUS_FAILURE || $status === BaseTestRunner::STATUS_ERROR;
    }

    /**
     * Runs the test case and collects the results in a TestResult object.
     * If no TestResult object is passed a new one will be created.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws CodeCoverageException
     * @throws CoveredCodeNotExecutedException
     * @throws InvalidArgumentException
     * @throws MissingCoversAnnotationException
     * @throws RuntimeException
     * @throws UnintentionallyCoveredCodeException
     * @throws UtilException
     */
    public function run(?TestResult $result = null): TestResult
=======
     * @throws CodeCoverageException
     * @throws UtilException
     * @throws \SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException
     * @throws \SebastianBergmann\CodeCoverage\InvalidArgumentException
     * @throws \SebastianBergmann\CodeCoverage\MissingCoversAnnotationException
     * @throws \SebastianBergmann\CodeCoverage\RuntimeException
     * @throws \SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function run(TestResult $result = null): TestResult
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if ($result === null) {
            $result = $this->createResult();
        }

        if (!$this instanceof WarningTestCase) {
            $this->setTestResultObject($result);
        }

        if (!$this instanceof WarningTestCase &&
            !$this instanceof SkippedTestCase &&
            !$this->handleDependencies()) {
            return $result;
        }

        if ($this->runInSeparateProcess()) {
            $runEntireClass = $this->runClassInSeparateProcess && !$this->runTestInSeparateProcess;

            try {
<<<<<<< HEAD
                $class = new ReflectionClass($this);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
                $class = new \ReflectionClass($this);
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

            if ($runEntireClass) {
<<<<<<< HEAD
                $template = new Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseClass.tpl'
                );
            } else {
                $template = new Text_Template(
=======
                $template = new \Text_Template(
                    __DIR__ . '/../Util/PHP/Template/TestCaseClass.tpl'
                );
            } else {
                $template = new \Text_Template(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    __DIR__ . '/../Util/PHP/Template/TestCaseMethod.tpl'
                );
            }

            if ($this->preserveGlobalState) {
                $constants     = GlobalState::getConstantsAsString();
                $globals       = GlobalState::getGlobalsAsString();
                $includedFiles = GlobalState::getIncludedFilesAsString();
                $iniSettings   = GlobalState::getIniSettingsAsString();
            } else {
                $constants = '';

                if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
<<<<<<< HEAD
                    $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
=======
                    $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . \var_export($GLOBALS['__PHPUNIT_BOOTSTRAP'], true) . ";\n";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                } else {
                    $globals = '';
                }

                $includedFiles = '';
                $iniSettings   = '';
            }

            $coverage                                   = $result->getCollectCodeCoverageInformation() ? 'true' : 'false';
            $isStrictAboutTestsThatDoNotTestAnything    = $result->isStrictAboutTestsThatDoNotTestAnything() ? 'true' : 'false';
            $isStrictAboutOutputDuringTests             = $result->isStrictAboutOutputDuringTests() ? 'true' : 'false';
            $enforcesTimeLimit                          = $result->enforcesTimeLimit() ? 'true' : 'false';
            $isStrictAboutTodoAnnotatedTests            = $result->isStrictAboutTodoAnnotatedTests() ? 'true' : 'false';
            $isStrictAboutResourceUsageDuringSmallTests = $result->isStrictAboutResourceUsageDuringSmallTests() ? 'true' : 'false';

<<<<<<< HEAD
            if (defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = var_export(PHPUNIT_COMPOSER_INSTALL, true);
=======
            if (\defined('PHPUNIT_COMPOSER_INSTALL')) {
                $composerAutoload = \var_export(PHPUNIT_COMPOSER_INSTALL, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } else {
                $composerAutoload = '\'\'';
            }

<<<<<<< HEAD
            if (defined('__PHPUNIT_PHAR__')) {
                $phar = var_export(__PHPUNIT_PHAR__, true);
=======
            if (\defined('__PHPUNIT_PHAR__')) {
                $phar = \var_export(__PHPUNIT_PHAR__, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            } else {
                $phar = '\'\'';
            }

            if ($result->getCodeCoverage()) {
                $codeCoverageFilter = $result->getCodeCoverage()->filter();
            } else {
                $codeCoverageFilter = null;
            }

<<<<<<< HEAD
            $data               = var_export(serialize($this->data), true);
            $dataName           = var_export($this->dataName, true);
            $dependencyInput    = var_export(serialize($this->dependencyInput), true);
            $includePath        = var_export(get_include_path(), true);
            $codeCoverageFilter = var_export(serialize($codeCoverageFilter), true);
=======
            $data               = \var_export(\serialize($this->data), true);
            $dataName           = \var_export($this->dataName, true);
            $dependencyInput    = \var_export(\serialize($this->dependencyInput), true);
            $includePath        = \var_export(\get_include_path(), true);
            $codeCoverageFilter = \var_export(\serialize($codeCoverageFilter), true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            // must do these fixes because TestCaseMethod.tpl has unserialize('{data}') in it, and we can't break BC
            // the lines above used to use addcslashes() rather than var_export(), which breaks null byte escape sequences
            $data               = "'." . $data . ".'";
            $dataName           = "'.(" . $dataName . ").'";
            $dependencyInput    = "'." . $dependencyInput . ".'";
            $includePath        = "'." . $includePath . ".'";
            $codeCoverageFilter = "'." . $codeCoverageFilter . ".'";

            $configurationFilePath = $GLOBALS['__PHPUNIT_CONFIGURATION_FILE'] ?? '';
<<<<<<< HEAD
            $processResultFile     = tempnam(sys_get_temp_dir(), 'phpunit_');
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            $var = [
                'composerAutoload'                           => $composerAutoload,
                'phar'                                       => $phar,
                'filename'                                   => $class->getFileName(),
                'className'                                  => $class->getName(),
                'collectCodeCoverageInformation'             => $coverage,
                'data'                                       => $data,
                'dataName'                                   => $dataName,
                'dependencyInput'                            => $dependencyInput,
                'constants'                                  => $constants,
                'globals'                                    => $globals,
                'include_path'                               => $includePath,
                'included_files'                             => $includedFiles,
                'iniSettings'                                => $iniSettings,
                'isStrictAboutTestsThatDoNotTestAnything'    => $isStrictAboutTestsThatDoNotTestAnything,
                'isStrictAboutOutputDuringTests'             => $isStrictAboutOutputDuringTests,
                'enforcesTimeLimit'                          => $enforcesTimeLimit,
                'isStrictAboutTodoAnnotatedTests'            => $isStrictAboutTodoAnnotatedTests,
                'isStrictAboutResourceUsageDuringSmallTests' => $isStrictAboutResourceUsageDuringSmallTests,
                'codeCoverageFilter'                         => $codeCoverageFilter,
                'configurationFilePath'                      => $configurationFilePath,
                'name'                                       => $this->getName(false),
<<<<<<< HEAD
                'processResultFile'                          => $processResultFile,
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ];

            if (!$runEntireClass) {
                $var['methodName'] = $this->name;
            }

            $template->setVar($var);

            $php = AbstractPhpProcess::factory();
<<<<<<< HEAD
            $php->runTestJob($template->render(), $this, $result, $processResultFile);
=======
            $php->runTestJob($template->render(), $this, $result);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        } else {
            $result->run($this);
        }

        $this->result = null;

        return $result;
    }

    /**
     * Returns a builder object to create mock objects using a fluent interface.
     *
     * @param string|string[] $className
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string[] $className
     *
=======
     * @psalm-param class-string<RealInstanceType>|string[] $className
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockBuilder<RealInstanceType>
     */
    public function getMockBuilder($className): MockBuilder
    {
<<<<<<< HEAD
        if (!is_string($className)) {
=======
        if (!\is_string($className)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->addWarning('Passing an array of interface names to getMockBuilder() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        $this->recordDoubledType($className);

        return new MockBuilder($this, $className);
    }

    public function registerComparator(Comparator $comparator): void
    {
        ComparatorFactory::getInstance()->register($comparator);

        $this->customComparators[] = $comparator;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     *
     * @deprecated Invoking this method has no effect; it will be removed in PHPUnit 9
     */
    public function setUseErrorHandler(bool $useErrorHandler): void
    {
    }

    /**
     * @return string[]
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doubledTypes(): array
    {
<<<<<<< HEAD
        return array_unique($this->doubledTypes);
=======
        return \array_unique($this->doubledTypes);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getGroups(): array
    {
        return $this->groups;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setGroups(array $groups): void
    {
        $this->groups = $groups;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getAnnotations(): array
    {
        return TestUtil::parseTestMethodAnnotations(
<<<<<<< HEAD
            static::class,
=======
            \get_class($this),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->name
        );
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getName(bool $withDataSet = true): string
    {
        if ($withDataSet) {
            return $this->name . $this->getDataSetAsString(false);
        }

        return $this->name;
    }

    /**
     * Returns the size of the test.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getSize(): int
    {
        return TestUtil::getSize(
<<<<<<< HEAD
            static::class,
=======
            \get_class($this),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->getName(false)
        );
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasSize(): bool
    {
        return $this->getSize() !== TestUtil::UNKNOWN;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isSmall(): bool
    {
        return $this->getSize() === TestUtil::SMALL;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isMedium(): bool
    {
        return $this->getSize() === TestUtil::MEDIUM;
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isLarge(): bool
    {
        return $this->getSize() === TestUtil::LARGE;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getActualOutput(): string
    {
        if (!$this->outputBufferingActive) {
            return $this->output;
        }

<<<<<<< HEAD
        return (string) ob_get_contents();
=======
        return (string) \ob_get_contents();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasOutput(): bool
    {
        if ($this->output === '') {
            return false;
        }

        if ($this->hasExpectationOnOutput()) {
            return false;
        }

        return true;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function doesNotPerformAssertions(): bool
    {
        return $this->doesNotPerformAssertions;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasExpectationOnOutput(): bool
    {
<<<<<<< HEAD
        return is_string($this->outputExpectedString) || is_string($this->outputExpectedRegex) || $this->outputRetrievedForAssertion;
=======
        return \is_string($this->outputExpectedString) || \is_string($this->outputExpectedRegex) || $this->outputRetrievedForAssertion;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedException(): ?string
    {
        return $this->expectedException;
    }

    /**
     * @return null|int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionCode()
    {
        return $this->expectedExceptionCode;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessage(): ?string
    {
        return $this->expectedExceptionMessage;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getExpectedExceptionMessageRegExp(): ?string
    {
        return $this->expectedExceptionMessageRegExp;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRegisterMockObjectsFromTestArgumentsRecursively(bool $flag): void
    {
        $this->registerMockObjectsFromTestArgumentsRecursively = $flag;
    }

    /**
<<<<<<< HEAD
     * @throws Throwable
=======
     * @throws \Throwable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function runBare(): void
    {
        $this->numAssertions = 0;

        $this->snapshotGlobalState();
        $this->startOutputBuffering();
<<<<<<< HEAD
        clearstatcache();
        $currentWorkingDirectory = getcwd();

        $hookMethods = TestUtil::getHookMethods(static::class);
=======
        \clearstatcache();
        $currentWorkingDirectory = \getcwd();

        $hookMethods = TestUtil::getHookMethods(\get_class($this));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $hasMetRequirements = false;

        try {
            $this->checkRequirements();
            $hasMetRequirements = true;

            if ($this->inIsolation) {
                foreach ($hookMethods['beforeClass'] as $method) {
<<<<<<< HEAD
                    $this->{$method}();
=======
                    $this->$method();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }
            }

            $this->setExpectedExceptionFromAnnotation();
            $this->setDoesNotPerformAssertionsFromAnnotation();

            foreach ($hookMethods['before'] as $method) {
<<<<<<< HEAD
                $this->{$method}();
=======
                $this->$method();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            $this->assertPreConditions();
            $this->testResult = $this->runTest();
            $this->verifyMockObjects();
            $this->assertPostConditions();

            if (!empty($this->warnings)) {
                throw new Warning(
<<<<<<< HEAD
                    implode(
                        "\n",
                        array_unique($this->warnings)
=======
                    \implode(
                        "\n",
                        \array_unique($this->warnings)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    )
                );
            }

            $this->status = BaseTestRunner::STATUS_PASSED;
        } catch (IncompleteTest $e) {
            $this->status        = BaseTestRunner::STATUS_INCOMPLETE;
            $this->statusMessage = $e->getMessage();
        } catch (SkippedTest $e) {
            $this->status        = BaseTestRunner::STATUS_SKIPPED;
            $this->statusMessage = $e->getMessage();
        } catch (Warning $e) {
            $this->status        = BaseTestRunner::STATUS_WARNING;
            $this->statusMessage = $e->getMessage();
        } catch (AssertionFailedError $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
        } catch (PredictionException $e) {
            $this->status        = BaseTestRunner::STATUS_FAILURE;
            $this->statusMessage = $e->getMessage();
<<<<<<< HEAD
        } catch (Throwable $_e) {
=======
        } catch (\Throwable $_e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $e                   = $_e;
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

        $this->mockObjects = [];
        $this->prophet     = null;

        // Tear down the fixture. An exception raised in tearDown() will be
        // caught and passed on when no exception was raised before.
        try {
            if ($hasMetRequirements) {
                foreach ($hookMethods['after'] as $method) {
<<<<<<< HEAD
                    $this->{$method}();
=======
                    $this->$method();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                if ($this->inIsolation) {
                    foreach ($hookMethods['afterClass'] as $method) {
<<<<<<< HEAD
                        $this->{$method}();
                    }
                }
            }
        } catch (Throwable $_e) {
=======
                        $this->$method();
                    }
                }
            }
        } catch (\Throwable $_e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $e = $e ?? $_e;
        }

        try {
            $this->stopOutputBuffering();
        } catch (RiskyTestError $_e) {
            $e = $e ?? $_e;
        }

        if (isset($_e)) {
            $this->status        = BaseTestRunner::STATUS_ERROR;
            $this->statusMessage = $_e->getMessage();
        }

<<<<<<< HEAD
        clearstatcache();

        if ($currentWorkingDirectory !== getcwd()) {
            chdir($currentWorkingDirectory);
=======
        \clearstatcache();

        if ($currentWorkingDirectory !== \getcwd()) {
            \chdir($currentWorkingDirectory);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->restoreGlobalState();
        $this->unregisterCustomComparators();
        $this->cleanupIniSettings();
        $this->cleanupLocaleSettings();
<<<<<<< HEAD
        libxml_clear_errors();
=======
        \libxml_clear_errors();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        // Perform assertion on output.
        if (!isset($e)) {
            try {
                if ($this->outputExpectedRegex !== null) {
                    $this->assertRegExp($this->outputExpectedRegex, $this->output);
                } elseif ($this->outputExpectedString !== null) {
                    $this->assertEquals($this->outputExpectedString, $this->output);
                }
<<<<<<< HEAD
            } catch (Throwable $_e) {
=======
            } catch (\Throwable $_e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $e = $_e;
            }
        }

        // Workaround for missing "finally".
        if (isset($e)) {
            if ($e instanceof PredictionException) {
                $e = new AssertionFailedError($e->getMessage());
            }

            $this->onNotSuccessfulTest($e);
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @param string[] $dependencies
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setDependencies(array $dependencies): void
    {
        $this->dependencies = $dependencies;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDependencies(): array
    {
        return $this->dependencies;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function hasDependencies(): bool
    {
<<<<<<< HEAD
        return count($this->dependencies) > 0;
=======
        return \count($this->dependencies) > 0;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setDependencyInput(array $dependencyInput): void
    {
        $this->dependencyInput = $dependencyInput;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDependencyInput(): array
    {
        return $this->dependencyInput;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBeStrictAboutChangesToGlobalState(?bool $beStrictAboutChangesToGlobalState): void
    {
        $this->beStrictAboutChangesToGlobalState = $beStrictAboutChangesToGlobalState;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBackupGlobals(?bool $backupGlobals): void
    {
        if ($this->backupGlobals === null && $backupGlobals !== null) {
            $this->backupGlobals = $backupGlobals;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setBackupStaticAttributes(?bool $backupStaticAttributes): void
    {
        if ($this->backupStaticAttributes === null && $backupStaticAttributes !== null) {
            $this->backupStaticAttributes = $backupStaticAttributes;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRunTestInSeparateProcess(bool $runTestInSeparateProcess): void
    {
        if ($this->runTestInSeparateProcess === null) {
            $this->runTestInSeparateProcess = $runTestInSeparateProcess;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setRunClassInSeparateProcess(bool $runClassInSeparateProcess): void
    {
        if ($this->runClassInSeparateProcess === null) {
            $this->runClassInSeparateProcess = $runClassInSeparateProcess;
        }
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setPreserveGlobalState(bool $preserveGlobalState): void
    {
        $this->preserveGlobalState = $preserveGlobalState;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setInIsolation(bool $inIsolation): void
    {
        $this->inIsolation = $inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function isInIsolation(): bool
    {
        return $this->inIsolation;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getResult()
    {
        return $this->testResult;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setResult($result): void
    {
        $this->testResult = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setOutputCallback(callable $callback): void
    {
        $this->outputCallback = $callback;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getTestResultObject(): ?TestResult
    {
        return $this->result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function setTestResultObject(TestResult $result): void
    {
        $this->result = $result;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function registerMockObject(MockObject $mockObject): void
    {
        $this->mockObjects[] = $mockObject;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function addToAssertionCount(int $count): void
    {
        $this->numAssertions += $count;
    }

    /**
     * Returns the number of assertions performed by this test.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getNumAssertions(): int
    {
        return $this->numAssertions;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function usesDataProvider(): bool
    {
        return !empty($this->data);
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function dataDescription(): string
    {
<<<<<<< HEAD
        return is_string($this->dataName) ? $this->dataName : '';
=======
        return \is_string($this->dataName) ? $this->dataName : '';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return int|string
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function dataName()
    {
        return $this->dataName;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getDataSetAsString(bool $includeData = true): string
    {
        $buffer = '';

        if (!empty($this->data)) {
<<<<<<< HEAD
            if (is_int($this->dataName)) {
                $buffer .= sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= sprintf(' with data set "%s"', $this->dataName);
            }

            if ($includeData) {
                $exporter = new Exporter;

                $buffer .= sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
=======
            if (\is_int($this->dataName)) {
                $buffer .= \sprintf(' with data set #%d', $this->dataName);
            } else {
                $buffer .= \sprintf(' with data set "%s"', $this->dataName);
            }

            $exporter = new Exporter;

            if ($includeData) {
                $buffer .= \sprintf(' (%s)', $exporter->shortenedRecursiveExport($this->data));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }

        return $buffer;
    }

    /**
     * Gets the data set of a TestCase.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function getProvidedData(): array
    {
        return $this->data;
    }

    /**
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    public function addWarning(string $warning): void
    {
        $this->warnings[] = $warning;
    }

    /**
     * Override to run the test and assert its state.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws Throwable
     */
    protected function runTest()
    {
        if (trim($this->name) === '') {
=======
     * @throws AssertionFailedError
     * @throws Exception
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws \Throwable
     */
    protected function runTest()
    {
        if (\trim($this->name) === '') {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new Exception(
                'PHPUnit\Framework\TestCase::$name must be a non-blank string.'
            );
        }

<<<<<<< HEAD
        $testArguments = array_merge($this->data, $this->dependencyInput);
=======
        $testArguments = \array_merge($this->data, $this->dependencyInput);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->registerMockObjectsFromTestArguments($testArguments);

        try {
<<<<<<< HEAD
            $testResult = $this->{$this->name}(...array_values($testArguments));
        } catch (Throwable $exception) {
=======
            $testResult = $this->{$this->name}(...\array_values($testArguments));
        } catch (\Throwable $exception) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            if (!$this->checkExceptionExpectations($exception)) {
                throw $exception;
            }

            if ($this->expectedException !== null) {
<<<<<<< HEAD
                if ($this->expectedException === Error::class) {
                    $this->assertThat(
                        $exception,
                        LogicalOr::fromConstraints(
                            new ExceptionConstraint(Error::class),
                            new ExceptionConstraint(\Error::class)
                        )
                    );
                } else {
                    $this->assertThat(
                        $exception,
                        new ExceptionConstraint(
                            $this->expectedException
                        )
                    );
                }
=======
                $this->assertThat(
                    $exception,
                    new ExceptionConstraint(
                        $this->expectedException
                    )
                );
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            if ($this->expectedExceptionMessage !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessage(
                        $this->expectedExceptionMessage
                    )
                );
            }

            if ($this->expectedExceptionMessageRegExp !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionMessageRegularExpression(
                        $this->expectedExceptionMessageRegExp
                    )
                );
            }

            if ($this->expectedExceptionCode !== null) {
                $this->assertThat(
                    $exception,
                    new ExceptionCode(
                        $this->expectedExceptionCode
                    )
                );
            }

            if ($this->deprecatedExpectExceptionMessageRegExpUsed) {
<<<<<<< HEAD
                $this->addWarning('expectExceptionMessageRegExp() is deprecated in PHPUnit 8 and will be removed in PHPUnit 9. Use expectExceptionMessageMatches() instead.');
=======
                $this->addWarning('expectExceptionMessageRegExp() is deprecated in PHPUnit 8 and will be removed in PHPUnit 9.');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            return;
        }

        if ($this->expectedException !== null) {
            $this->assertThat(
                null,
                new ExceptionConstraint(
                    $this->expectedException
                )
            );
        } elseif ($this->expectedExceptionMessage !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Failed asserting that exception with message "%s" is thrown',
                    $this->expectedExceptionMessage
                )
            );
        } elseif ($this->expectedExceptionMessageRegExp !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Failed asserting that exception with message matching "%s" is thrown',
                    $this->expectedExceptionMessageRegExp
                )
            );
        } elseif ($this->expectedExceptionCode !== null) {
            $this->numAssertions++;

            throw new AssertionFailedError(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'Failed asserting that exception with code "%s" is thrown',
                    $this->expectedExceptionCode
                )
            );
        }

        return $testResult;
    }

    /**
     * This method is a wrapper for the ini_set() function that automatically
     * resets the modified php.ini setting to its original value after the
     * test is run.
     *
     * @throws Exception
     */
    protected function iniSet(string $varName, string $newValue): void
    {
<<<<<<< HEAD
        $currentValue = ini_set($varName, $newValue);
=======
        $currentValue = \ini_set($varName, $newValue);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($currentValue !== false) {
            $this->iniSettings[$varName] = $currentValue;
        } else {
            throw new Exception(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'INI setting "%s" could not be set to "%s".',
                    $varName,
                    $newValue
                )
            );
        }
    }

    /**
     * This method is a wrapper for the setlocale() function that automatically
     * resets the locale to its original value after the test is run.
     *
     * @throws Exception
     */
    protected function setLocale(...$args): void
    {
<<<<<<< HEAD
        if (count($args) < 2) {
=======
        if (\count($args) < 2) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            throw new Exception;
        }

        [$category, $locale] = $args;

<<<<<<< HEAD
        if (defined('LC_MESSAGES')) {
            $categories[] = LC_MESSAGES;
        }

        if (!in_array($category, self::LOCALE_CATEGORIES, true)) {
            throw new Exception;
        }

        if (!is_array($locale) && !is_string($locale)) {
            throw new Exception;
        }

        $this->locale[$category] = setlocale($category, 0);

        $result = setlocale(...$args);
=======
        if (\defined('LC_MESSAGES')) {
            $categories[] = \LC_MESSAGES;
        }

        if (!\in_array($category, self::LOCALE_CATEGORIES, true)) {
            throw new Exception;
        }

        if (!\is_array($locale) && !\is_string($locale)) {
            throw new Exception;
        }

        $this->locale[$category] = \setlocale($category, 0);

        $result = \setlocale(...$args);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if ($result === false) {
            throw new Exception(
                'The locale functionality is not implemented on your platform, ' .
                'the specified locale does not exist or the category name is ' .
                'invalid.'
            );
        }
    }

    /**
     * Makes configurable stub for the specified class.
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param    class-string<RealInstanceType> $originalClassName
     *
=======
     * @psalm-param    class-string<RealInstanceType> $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return   Stub&RealInstanceType
     */
    protected function createStub(string $originalClassName): Stub
    {
        return $this->createMock($originalClassName);
    }

    /**
     * Returns a mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createMock($originalClassName): MockObject
    {
<<<<<<< HEAD
        if (!is_string($originalClassName)) {
=======
        if (!\is_string($originalClassName)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->addWarning('Passing an array of interface names to createMock() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        return $this->getMockBuilder($originalClassName)
<<<<<<< HEAD
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->getMock();
=======
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->getMock();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Returns a configured mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createConfiguredMock($originalClassName, array $configuration): MockObject
    {
        $o = $this->createMock($originalClassName);

        foreach ($configuration as $method => $return) {
            $o->method($method)->willReturn($return);
        }

        return $o;
    }

    /**
     * Returns a partial mock object for the specified class.
     *
     * @param string|string[] $originalClassName
     * @param string[]        $methods
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType>|string[] $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createPartialMock($originalClassName, array $methods): MockObject
    {
<<<<<<< HEAD
        if (!is_string($originalClassName)) {
            $this->addWarning('Passing an array of interface names to createPartialMock() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        $class_names = is_array($originalClassName) ? $originalClassName : [$originalClassName];

        foreach ($class_names as $class_name) {
            $reflection = new ReflectionClass($class_name);

            $mockedMethodsThatDontExist = array_filter(
                $methods,
                static function (string $method) use ($reflection)
                {
=======
        if (!\is_string($originalClassName)) {
            $this->addWarning('Passing an array of interface names to createPartialMock() for creating a test double that implements multiple interfaces is deprecated and will no longer be supported in PHPUnit 9.');
        }

        $class_names = \is_array($originalClassName) ? $originalClassName : [$originalClassName];

        foreach ($class_names as $class_name) {
            $reflection = new \ReflectionClass($class_name);

            $mockedMethodsThatDontExist = \array_filter(
                $methods,
                static function (string $method) use ($reflection) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    return !$reflection->hasMethod($method);
                }
            );

            if ($mockedMethodsThatDontExist) {
                $this->addWarning(
<<<<<<< HEAD
                    sprintf(
                        'createPartialMock called with method(s) %s that do not exist in %s. This will not be allowed in future versions of PHPUnit.',
                        implode(', ', $mockedMethodsThatDontExist),
=======
                    \sprintf(
                        'createPartialMock called with method(s) %s that do not exist in %s. This will not be allowed in future versions of PHPUnit.',
                        \implode(', ', $mockedMethodsThatDontExist),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        $class_name
                    )
                );
            }
        }

        return $this->getMockBuilder($originalClassName)
<<<<<<< HEAD
            ->disableOriginalConstructor()
            ->disableOriginalClone()
            ->disableArgumentCloning()
            ->disallowMockingUnknownTypes()
            ->setMethods(empty($methods) ? null : $methods)
            ->getMock();
=======
                    ->disableOriginalConstructor()
                    ->disableOriginalClone()
                    ->disableArgumentCloning()
                    ->disallowMockingUnknownTypes()
                    ->setMethods(empty($methods) ? null : $methods)
                    ->getMock();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Returns a test proxy for the specified class.
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType> $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function createTestProxy(string $originalClassName, array $constructorArguments = []): MockObject
    {
        return $this->getMockBuilder($originalClassName)
<<<<<<< HEAD
            ->setConstructorArgs($constructorArguments)
            ->enableProxyingToOriginalMethods()
            ->getMock();
=======
                    ->setConstructorArgs($constructorArguments)
                    ->enableProxyingToOriginalMethods()
                    ->getMock();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Mocks the specified class and returns the name of the mocked class.
     *
     * @param string $originalClassName
     * @param array  $methods
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param bool   $cloneArguments
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return class-string<MockObject&RealInstanceType>
     */
    protected function getMockClass($originalClassName, $methods = [], array $arguments = [], $mockClassName = '', $callOriginalConstructor = false, $callOriginalClone = true, $callAutoload = true, $cloneArguments = false): string
    {
        $this->recordDoubledType($originalClassName);

        $mock = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $cloneArguments
        );

<<<<<<< HEAD
        return get_class($mock);
=======
        return \get_class($mock);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Returns a mock object for the specified abstract class with all abstract
     * methods of the class mocked. Concrete methods are not mocked by default.
     * To mock concrete methods, use the 7th parameter ($mockedMethods).
     *
     * @param string $originalClassName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType> $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType> $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockForAbstractClass($originalClassName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($originalClassName);

        $mockObject = $this->getMockObjectGenerator()->getMockForAbstractClass(
            $originalClassName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

        $this->registerMockObject($mockObject);

        return $mockObject;
    }

    /**
     * Returns a mock object based on the given WSDL file.
     *
     * @param string $wsdlFile
     * @param string $originalClassName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param array  $options                 An array of options passed to SOAPClient::_construct
     *
     * @psalm-template RealInstanceType of object
<<<<<<< HEAD
     *
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
     *
=======
     * @psalm-param class-string<RealInstanceType>|string $originalClassName
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @psalm-return MockObject&RealInstanceType
     */
    protected function getMockFromWsdl($wsdlFile, $originalClassName = '', $mockClassName = '', array $methods = [], $callOriginalConstructor = true, array $options = []): MockObject
    {
        $this->recordDoubledType('SoapClient');

        if ($originalClassName === '') {
<<<<<<< HEAD
            $fileName          = pathinfo(basename(parse_url($wsdlFile, PHP_URL_PATH)), PATHINFO_FILENAME);
            $originalClassName = preg_replace('/\W/', '', $fileName);
        }

        if (!class_exists($originalClassName)) {
=======
            $fileName          = \pathinfo(\basename(\parse_url($wsdlFile, \PHP_URL_PATH)), \PATHINFO_FILENAME);
            $originalClassName = \preg_replace('/\W/', '', $fileName);
        }

        if (!\class_exists($originalClassName)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            eval(
                $this->getMockObjectGenerator()->generateClassFromWsdl(
                    $wsdlFile,
                    $originalClassName,
                    $methods,
                    $options
                )
            );
        }

        $mockObject = $this->getMockObjectGenerator()->getMock(
            $originalClassName,
            $methods,
            ['', $options],
            $mockClassName,
            $callOriginalConstructor,
            false,
            false
        );

        $this->registerMockObject($mockObject);

        return $mockObject;
    }

    /**
     * Returns a mock object for the specified trait with all abstract methods
     * of the trait mocked. Concrete methods to mock can be specified with the
     * `$mockedMethods` parameter.
     *
     * @param string $traitName
     * @param string $mockClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     * @param array  $mockedMethods
     * @param bool   $cloneArguments
     */
    protected function getMockForTrait($traitName, array $arguments = [], $mockClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true, $mockedMethods = [], $cloneArguments = false): MockObject
    {
        $this->recordDoubledType($traitName);

        $mockObject = $this->getMockObjectGenerator()->getMockForTrait(
            $traitName,
            $arguments,
            $mockClassName,
            $callOriginalConstructor,
            $callOriginalClone,
            $callAutoload,
            $mockedMethods,
            $cloneArguments
        );

        $this->registerMockObject($mockObject);

        return $mockObject;
    }

    /**
     * Returns an object for the specified trait.
     *
     * @param string $traitName
     * @param string $traitClassName
     * @param bool   $callOriginalConstructor
     * @param bool   $callOriginalClone
     * @param bool   $callAutoload
     *
     * @return object
     */
<<<<<<< HEAD
    protected function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)/* : object */
=======
    protected function getObjectForTrait($traitName, array $arguments = [], $traitClassName = '', $callOriginalConstructor = true, $callOriginalClone = true, $callAutoload = true)/*: object*/
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->recordDoubledType($traitName);

        return $this->getMockObjectGenerator()->getObjectForTrait(
            $traitName,
            $traitClassName,
            $callAutoload,
            $callOriginalConstructor,
            $arguments
        );
    }

    /**
<<<<<<< HEAD
     * @param ?string $classOrInterface
     *
     * @throws ClassNotFoundException
     * @throws DoubleException
     * @throws InterfaceNotFoundException
=======
     * @param null|string $classOrInterface
     *
     * @throws \Prophecy\Exception\Doubler\ClassNotFoundException
     * @throws \Prophecy\Exception\Doubler\DoubleException
     * @throws \Prophecy\Exception\Doubler\InterfaceNotFoundException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @psalm-param class-string|null $classOrInterface
     */
    protected function prophesize($classOrInterface = null): ObjectProphecy
    {
<<<<<<< HEAD
        if (!class_exists(Prophet::class)) {
            throw new Exception('This test uses TestCase::prophesize(), but phpspec/prophecy is not installed. Please run "composer require --dev phpspec/prophecy".');
        }

        if (is_string($classOrInterface)) {
=======
        if (\is_string($classOrInterface)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->recordDoubledType($classOrInterface);
        }

        return $this->getProphet()->prophesize($classOrInterface);
    }

    /**
     * Creates a default TestResult object.
     *
     * @internal This method is not covered by the backward compatibility promise for PHPUnit
     */
    protected function createResult(): TestResult
    {
        return new TestResult;
    }

    /**
<<<<<<< HEAD
     * This method is called when a test method did not execute successfully.
     *
     * @throws Throwable
     */
    protected function onNotSuccessfulTest(Throwable $t): void
=======
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between setUp() and test.
     */
    protected function assertPreConditions(): void
    {
    }

    /**
     * Performs assertions shared by all tests of a test case.
     *
     * This method is called between test and tearDown().
     */
    protected function assertPostConditions(): void
    {
    }

    /**
     * This method is called when a test method did not execute successfully.
     *
     * @throws \Throwable
     */
    protected function onNotSuccessfulTest(\Throwable $t): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        throw $t;
    }

    private function setExpectedExceptionFromAnnotation(): void
    {
        if ($this->name === null) {
            return;
        }

        try {
            $expectedException = TestUtil::getExpectedException(
<<<<<<< HEAD
                static::class,
=======
                \get_class($this),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $this->name
            );

            if ($expectedException !== false) {
                $this->addWarning('The @expectedException, @expectedExceptionCode, @expectedExceptionMessage, and @expectedExceptionMessageRegExp annotations are deprecated. They will be removed in PHPUnit 9. Refactor your test to use expectException(), expectExceptionCode(), expectExceptionMessage(), or expectExceptionMessageMatches() instead.');

                $this->expectException($expectedException['class']);

                if ($expectedException['code'] !== null) {
                    $this->expectExceptionCode($expectedException['code']);
                }

                if ($expectedException['message'] !== '') {
                    $this->expectExceptionMessage($expectedException['message']);
                } elseif ($expectedException['message_regex'] !== '') {
                    $this->expectExceptionMessageMatches($expectedException['message_regex']);
                }
            }
        } catch (UtilException $e) {
        }
    }

    /**
<<<<<<< HEAD
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     * @throws Warning
     */
    private function checkRequirements(): void
    {
        if (!$this->name || !method_exists($this, $this->name)) {
=======
     * @throws Warning
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     */
    private function checkRequirements(): void
    {
        if (!$this->name || !\method_exists($this, $this->name)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return;
        }

        $missingRequirements = TestUtil::getMissingRequirements(
<<<<<<< HEAD
            static::class,
=======
            \get_class($this),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $this->name
        );

        if (!empty($missingRequirements)) {
<<<<<<< HEAD
            $this->markTestSkipped(implode(PHP_EOL, $missingRequirements));
=======
            $this->markTestSkipped(\implode(\PHP_EOL, $missingRequirements));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
<<<<<<< HEAD
     * @throws Throwable
=======
     * @throws \Throwable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function verifyMockObjects(): void
    {
        foreach ($this->mockObjects as $mockObject) {
            if ($mockObject->__phpunit_hasMatchers()) {
                $this->numAssertions++;
            }

            $mockObject->__phpunit_verify(
                $this->shouldInvocationMockerBeReset($mockObject)
            );
        }

        if ($this->prophet !== null) {
            try {
                $this->prophet->checkPredictions();
            } finally {
                foreach ($this->prophet->getProphecies() as $objectProphecy) {
                    foreach ($objectProphecy->getMethodProphecies() as $methodProphecies) {
                        foreach ($methodProphecies as $methodProphecy) {
<<<<<<< HEAD
                            assert($methodProphecy instanceof MethodProphecy);

                            $this->numAssertions += count($methodProphecy->getCheckedPredictions());
=======
                            \assert($methodProphecy instanceof MethodProphecy);

                            $this->numAssertions += \count($methodProphecy->getCheckedPredictions());
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        }
                    }
                }
            }
        }
    }

    private function handleDependencies(): bool
    {
        if (!empty($this->dependencies) && !$this->inIsolation) {
<<<<<<< HEAD
            $passed     = $this->result->passed();
            $passedKeys = array_keys($passed);

            foreach ($passedKeys as $key => $value) {
                $pos = strpos($value, ' with data set');

                if ($pos !== false) {
                    $passedKeys[$key] = substr($value, 0, $pos);
                }
            }

            $passedKeys = array_flip(array_unique($passedKeys));
=======
            $className  = \get_class($this);
            $passed     = $this->result->passed();
            $passedKeys = \array_keys($passed);

            foreach ($passedKeys as $key => $value) {
                $pos = \strpos($value, ' with data set');

                if ($pos !== false) {
                    $passedKeys[$key] = \substr($value, 0, $pos);
                }
            }

            $passedKeys = \array_flip(\array_unique($passedKeys));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            foreach ($this->dependencies as $dependency) {
                $deepClone    = false;
                $shallowClone = false;

                if (empty($dependency)) {
                    $this->markSkippedForNotSpecifyingDependency();

                    return false;
                }

<<<<<<< HEAD
                if (strpos($dependency, 'clone ') === 0) {
                    $deepClone  = true;
                    $dependency = substr($dependency, strlen('clone '));
                } elseif (strpos($dependency, '!clone ') === 0) {
                    $deepClone  = false;
                    $dependency = substr($dependency, strlen('!clone '));
                }

                if (strpos($dependency, 'shallowClone ') === 0) {
                    $shallowClone = true;
                    $dependency   = substr($dependency, strlen('shallowClone '));
                } elseif (strpos($dependency, '!shallowClone ') === 0) {
                    $shallowClone = false;
                    $dependency   = substr($dependency, strlen('!shallowClone '));
                }

                if (strpos($dependency, '::') === false) {
                    $dependency = static::class . '::' . $dependency;
=======
                if (\strpos($dependency, 'clone ') === 0) {
                    $deepClone  = true;
                    $dependency = \substr($dependency, \strlen('clone '));
                } elseif (\strpos($dependency, '!clone ') === 0) {
                    $deepClone  = false;
                    $dependency = \substr($dependency, \strlen('!clone '));
                }

                if (\strpos($dependency, 'shallowClone ') === 0) {
                    $shallowClone = true;
                    $dependency   = \substr($dependency, \strlen('shallowClone '));
                } elseif (\strpos($dependency, '!shallowClone ') === 0) {
                    $shallowClone = false;
                    $dependency   = \substr($dependency, \strlen('!shallowClone '));
                }

                if (\strpos($dependency, '::') === false) {
                    $dependency = $className . '::' . $dependency;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                if (!isset($passedKeys[$dependency])) {
                    if (!$this->isCallableTestMethod($dependency)) {
                        $this->warnAboutDependencyThatDoesNotExist($dependency);
                    } else {
                        $this->markSkippedForMissingDependency($dependency);
                    }

                    return false;
                }

                if (isset($passed[$dependency])) {
                    if ($passed[$dependency]['size'] !== TestUtil::UNKNOWN &&
                        $this->getSize() !== TestUtil::UNKNOWN &&
                        $passed[$dependency]['size'] > $this->getSize()) {
                        $this->result->addError(
                            $this,
                            new SkippedTestError(
                                'This test depends on a test that is larger than itself.'
                            ),
                            0
                        );

                        return false;
                    }

                    if ($deepClone) {
                        $deepCopy = new DeepCopy;
                        $deepCopy->skipUncloneable(false);

                        $this->dependencyInput[$dependency] = $deepCopy->copy($passed[$dependency]['result']);
                    } elseif ($shallowClone) {
                        $this->dependencyInput[$dependency] = clone $passed[$dependency]['result'];
                    } else {
                        $this->dependencyInput[$dependency] = $passed[$dependency]['result'];
                    }
                } else {
                    $this->dependencyInput[$dependency] = null;
                }
            }
        }

        return true;
    }

    private function markSkippedForNotSpecifyingDependency(): void
    {
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
<<<<<<< HEAD
                'This method has an invalid @depends annotation.'
=======
                \sprintf('This method has an invalid @depends annotation.')
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ),
            0
        );

        $this->result->endTest($this, 0);
    }

    private function markSkippedForMissingDependency(string $dependency): void
    {
        $this->status = BaseTestRunner::STATUS_SKIPPED;

        $this->result->startTest($this);

        $this->result->addError(
            $this,
            new SkippedTestError(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'This test depends on "%s" to pass.',
                    $dependency
                )
            ),
            0
        );

        $this->result->endTest($this, 0);
    }

    private function warnAboutDependencyThatDoesNotExist(string $dependency): void
    {
        $this->status = BaseTestRunner::STATUS_WARNING;

        $this->result->startTest($this);

        $this->result->addWarning(
            $this,
            new Warning(
<<<<<<< HEAD
                sprintf(
=======
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'This test depends on "%s" which does not exist.',
                    $dependency
                )
            ),
            0
        );

        $this->result->endTest($this, 0);
    }

    /**
     * Get the mock object generator, creating it if it doesn't exist.
     */
    private function getMockObjectGenerator(): MockGenerator
    {
        if ($this->mockObjectGenerator === null) {
            $this->mockObjectGenerator = new MockGenerator;
        }

        return $this->mockObjectGenerator;
    }

    private function startOutputBuffering(): void
    {
<<<<<<< HEAD
        ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = ob_get_level();
=======
        \ob_start();

        $this->outputBufferingActive = true;
        $this->outputBufferingLevel  = \ob_get_level();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @throws RiskyTestError
     */
    private function stopOutputBuffering(): void
    {
<<<<<<< HEAD
        if (ob_get_level() !== $this->outputBufferingLevel) {
            while (ob_get_level() >= $this->outputBufferingLevel) {
                ob_end_clean();
=======
        if (\ob_get_level() !== $this->outputBufferingLevel) {
            while (\ob_get_level() >= $this->outputBufferingLevel) {
                \ob_end_clean();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }

            throw new RiskyTestError(
                'Test code or tested code did not (only) close its own output buffers'
            );
        }

<<<<<<< HEAD
        $this->output = ob_get_contents();

        if ($this->outputCallback !== false) {
            $this->output = (string) call_user_func($this->outputCallback, $this->output);
        }

        ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = ob_get_level();
=======
        $this->output = \ob_get_contents();

        if ($this->outputCallback !== false) {
            $this->output = (string) \call_user_func($this->outputCallback, $this->output);
        }

        \ob_end_clean();

        $this->outputBufferingActive = false;
        $this->outputBufferingLevel  = \ob_get_level();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    private function snapshotGlobalState(): void
    {
        if ($this->runTestInSeparateProcess || $this->inIsolation ||
            (!$this->backupGlobals && !$this->backupStaticAttributes)) {
            return;
        }

        $this->snapshot = $this->createGlobalStateSnapshot($this->backupGlobals === true);
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     * @throws RiskyTestError
=======
     * @throws RiskyTestError
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function restoreGlobalState(): void
    {
        if (!$this->snapshot instanceof Snapshot) {
            return;
        }

        if ($this->beStrictAboutChangesToGlobalState) {
            try {
                $this->compareGlobalStateSnapshots(
                    $this->snapshot,
                    $this->createGlobalStateSnapshot($this->backupGlobals === true)
                );
            } catch (RiskyTestError $rte) {
                // Intentionally left empty
            }
        }

        $restorer = new Restorer;

        if ($this->backupGlobals) {
            $restorer->restoreGlobalVariables($this->snapshot);
        }

        if ($this->backupStaticAttributes) {
            $restorer->restoreStaticAttributes($this->snapshot);
        }

        $this->snapshot = null;

        if (isset($rte)) {
            throw $rte;
        }
    }

    private function createGlobalStateSnapshot(bool $backupGlobals): Snapshot
    {
        $blacklist = new Blacklist;

        foreach ($this->backupGlobalsBlacklist as $globalVariable) {
            $blacklist->addGlobalVariable($globalVariable);
        }

<<<<<<< HEAD
        if (!defined('PHPUNIT_TESTSUITE')) {
=======
        if (!\defined('PHPUNIT_TESTSUITE')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $blacklist->addClassNamePrefix('PHPUnit');
            $blacklist->addClassNamePrefix('SebastianBergmann\CodeCoverage');
            $blacklist->addClassNamePrefix('SebastianBergmann\FileIterator');
            $blacklist->addClassNamePrefix('SebastianBergmann\Invoker');
            $blacklist->addClassNamePrefix('SebastianBergmann\Timer');
            $blacklist->addClassNamePrefix('PHP_Token');
<<<<<<< HEAD
            $blacklist->addClassNamePrefix('Text_Template');
            $blacklist->addClassNamePrefix('Doctrine\Instantiator');
            $blacklist->addClassNamePrefix('Prophecy');
            $blacklist->addStaticAttribute(ComparatorFactory::class, 'instance');
=======
            $blacklist->addClassNamePrefix('Symfony');
            $blacklist->addClassNamePrefix('Text_Template');
            $blacklist->addClassNamePrefix('Doctrine\Instantiator');
            $blacklist->addClassNamePrefix('Prophecy');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            foreach ($this->backupStaticAttributesBlacklist as $class => $attributes) {
                foreach ($attributes as $attribute) {
                    $blacklist->addStaticAttribute($class, $attribute);
                }
            }
        }

        return new Snapshot(
            $blacklist,
            $backupGlobals,
            (bool) $this->backupStaticAttributes,
            false,
            false,
            false,
            false,
            false,
            false,
            false
        );
    }

    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     * @throws RiskyTestError
=======
     * @throws RiskyTestError
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function compareGlobalStateSnapshots(Snapshot $before, Snapshot $after): void
    {
        $backupGlobals = $this->backupGlobals === null || $this->backupGlobals;

        if ($backupGlobals) {
            $this->compareGlobalStateSnapshotPart(
                $before->globalVariables(),
                $after->globalVariables(),
                "--- Global variables before the test\n+++ Global variables after the test\n"
            );

            $this->compareGlobalStateSnapshotPart(
                $before->superGlobalVariables(),
                $after->superGlobalVariables(),
                "--- Super-global variables before the test\n+++ Super-global variables after the test\n"
            );
        }

        if ($this->backupStaticAttributes) {
            $this->compareGlobalStateSnapshotPart(
                $before->staticAttributes(),
                $after->staticAttributes(),
                "--- Static attributes before the test\n+++ Static attributes after the test\n"
            );
        }
    }

    /**
     * @throws RiskyTestError
     */
    private function compareGlobalStateSnapshotPart(array $before, array $after, string $header): void
    {
        if ($before != $after) {
            $differ   = new Differ($header);
            $exporter = new Exporter;

            $diff = $differ->diff(
                $exporter->export($before),
                $exporter->export($after)
            );

            throw new RiskyTestError(
                $diff
            );
        }
    }

    private function getProphet(): Prophet
    {
        if ($this->prophet === null) {
            $this->prophet = new Prophet;
        }

        return $this->prophet;
    }

    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     */
    private function shouldInvocationMockerBeReset(MockObject $mock): bool
    {
        $enumerator = new Enumerator;

        foreach ($enumerator->enumerate($this->dependencyInput) as $object) {
            if ($mock === $object) {
                return false;
            }
        }

<<<<<<< HEAD
        if (!is_array($this->testResult) && !is_object($this->testResult)) {
            return true;
        }

        return !in_array($mock, $enumerator->enumerate($this->testResult), true);
=======
        if (!\is_array($this->testResult) && !\is_object($this->testResult)) {
            return true;
        }

        return !\in_array($mock, $enumerator->enumerate($this->testResult), true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @throws \SebastianBergmann\ObjectEnumerator\InvalidArgumentException
     * @throws \SebastianBergmann\ObjectReflector\InvalidArgumentException
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function registerMockObjectsFromTestArguments(array $testArguments, array &$visited = []): void
    {
        if ($this->registerMockObjectsFromTestArgumentsRecursively) {
            foreach ((new Enumerator)->enumerate($testArguments) as $object) {
                if ($object instanceof MockObject) {
                    $this->registerMockObject($object);
                }
            }
        } else {
            foreach ($testArguments as $testArgument) {
                if ($testArgument instanceof MockObject) {
                    if (Type::isCloneable($testArgument)) {
                        $testArgument = clone $testArgument;
                    }

                    $this->registerMockObject($testArgument);
<<<<<<< HEAD
                } elseif (is_array($testArgument) && !in_array($testArgument, $visited, true)) {
=======
                } elseif (\is_array($testArgument) && !\in_array($testArgument, $visited, true)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $visited[] = $testArgument;

                    $this->registerMockObjectsFromTestArguments(
                        $testArgument,
                        $visited
                    );
                }
            }
        }
    }

    private function setDoesNotPerformAssertionsFromAnnotation(): void
    {
        $annotations = $this->getAnnotations();

        if (isset($annotations['method']['doesNotPerformAssertions'])) {
            $this->doesNotPerformAssertions = true;
        }
    }

    private function unregisterCustomComparators(): void
    {
        $factory = ComparatorFactory::getInstance();

        foreach ($this->customComparators as $comparator) {
            $factory->unregister($comparator);
        }

        $this->customComparators = [];
    }

    private function cleanupIniSettings(): void
    {
        foreach ($this->iniSettings as $varName => $oldValue) {
<<<<<<< HEAD
            ini_set($varName, $oldValue);
=======
            \ini_set($varName, $oldValue);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->iniSettings = [];
    }

    private function cleanupLocaleSettings(): void
    {
        foreach ($this->locale as $category => $locale) {
<<<<<<< HEAD
            setlocale($category, $locale);
=======
            \setlocale($category, $locale);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->locale = [];
    }

    /**
     * @throws Exception
     */
<<<<<<< HEAD
    private function checkExceptionExpectations(Throwable $throwable): bool
=======
    private function checkExceptionExpectations(\Throwable $throwable): bool
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $result = false;

        if ($this->expectedException !== null || $this->expectedExceptionCode !== null || $this->expectedExceptionMessage !== null || $this->expectedExceptionMessageRegExp !== null) {
            $result = true;
        }

        if ($throwable instanceof Exception) {
            $result = false;
        }

<<<<<<< HEAD
        if (is_string($this->expectedException)) {
            try {
                $reflector = new ReflectionClass($this->expectedException);
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
        if (\is_string($this->expectedException)) {
            try {
                $reflector = new \ReflectionClass($this->expectedException);
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

            if ($this->expectedException === 'PHPUnit\Framework\Exception' ||
                $this->expectedException === '\PHPUnit\Framework\Exception' ||
                $reflector->isSubclassOf(Exception::class)) {
                $result = true;
            }
        }

        return $result;
    }

    private function runInSeparateProcess(): bool
    {
        return ($this->runTestInSeparateProcess || $this->runClassInSeparateProcess) &&
            !$this->inIsolation && !$this instanceof PhptTestCase;
    }

    /**
     * @param string|string[] $originalClassName
     */
    private function recordDoubledType($originalClassName): void
    {
<<<<<<< HEAD
        if (is_string($originalClassName)) {
            $this->doubledTypes[] = $originalClassName;
        }

        if (is_array($originalClassName)) {
            foreach ($originalClassName as $_originalClassName) {
                if (is_string($_originalClassName)) {
=======
        if (\is_string($originalClassName)) {
            $this->doubledTypes[] = $originalClassName;
        }

        if (\is_array($originalClassName)) {
            foreach ($originalClassName as $_originalClassName) {
                if (\is_string($_originalClassName)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $this->doubledTypes[] = $_originalClassName;
                }
            }
        }
    }

    private function isCallableTestMethod(string $dependency): bool
    {
<<<<<<< HEAD
        [$className, $methodName] = explode('::', $dependency);

        if (!class_exists($className)) {
=======
        [$className, $methodName] = \explode('::', $dependency);

        if (!\class_exists($className)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        try {
<<<<<<< HEAD
            $class = new ReflectionClass($className);
        } catch (ReflectionException $e) {
=======
            $class = new \ReflectionClass($className);
        } catch (\ReflectionException $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        if (!$class->isSubclassOf(__CLASS__)) {
            return false;
        }

        if (!$class->hasMethod($methodName)) {
            return false;
        }

        try {
            $method = $class->getMethod($methodName);
<<<<<<< HEAD
        } catch (ReflectionException $e) {
=======
        } catch (\ReflectionException $e) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        return TestUtil::isTestMethod($method);
    }
}
