<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Runner;

<<<<<<< HEAD
use const DEBUG_BACKTRACE_IGNORE_ARGS;
use const DIRECTORY_SEPARATOR;
use function array_merge;
use function basename;
use function debug_backtrace;
use function defined;
use function dirname;
use function explode;
use function extension_loaded;
use function file;
use function file_exists;
use function file_get_contents;
use function file_put_contents;
use function is_array;
use function is_file;
use function is_readable;
use function is_string;
use function ltrim;
use function phpversion;
use function preg_match;
use function preg_replace;
use function preg_split;
use function realpath;
use function rtrim;
use function sprintf;
use function str_replace;
use function strncasecmp;
use function strpos;
use function substr;
use function trim;
use function unlink;
use function unserialize;
use function var_export;
use function version_compare;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\IncompleteTestError;
use PHPUnit\Framework\PHPTAssertionFailedError;
use PHPUnit\Framework\SelfDescribing;
use PHPUnit\Framework\SkippedTestError;
use PHPUnit\Framework\SyntheticSkippedError;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestResult;
use PHPUnit\Util\PHP\AbstractPhpProcess;
<<<<<<< HEAD
use SebastianBergmann\CodeCoverage\CoveredCodeNotExecutedException;
use SebastianBergmann\CodeCoverage\InvalidArgumentException;
use SebastianBergmann\CodeCoverage\MissingCoversAnnotationException;
use SebastianBergmann\CodeCoverage\RuntimeException;
use SebastianBergmann\CodeCoverage\UnintentionallyCoveredCodeException;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\Timer\Timer;
use Text_Template;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class PhptTestCase implements SelfDescribing, Test
{
    /**
<<<<<<< HEAD
=======
     * @var string[]
     */
    private const SETTINGS = [
        'allow_url_fopen=1',
        'auto_append_file=',
        'auto_prepend_file=',
        'disable_functions=',
        'display_errors=1',
        'docref_ext=.html',
        'docref_root=',
        'error_append_string=',
        'error_prepend_string=',
        'error_reporting=-1',
        'html_errors=0',
        'log_errors=0',
        'magic_quotes_runtime=0',
        'open_basedir=',
        'output_buffering=Off',
        'output_handler=',
        'report_memleaks=0',
        'report_zend_debug=0',
        'safe_mode=0',
        'xdebug.default_enable=0',
    ];

    /**
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @var string
     */
    private $filename;

    /**
     * @var AbstractPhpProcess
     */
    private $phpUtil;

    /**
     * @var string
     */
    private $output = '';

    /**
     * Constructs a test case with the given filename.
     *
     * @throws Exception
     */
<<<<<<< HEAD
    public function __construct(string $filename, ?AbstractPhpProcess $phpUtil = null)
    {
        if (!is_file($filename)) {
            throw new Exception(
                sprintf(
=======
    public function __construct(string $filename, AbstractPhpProcess $phpUtil = null)
    {
        if (!\is_file($filename)) {
            throw new Exception(
                \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    'File "%s" does not exist.',
                    $filename
                )
            );
        }

        $this->filename = $filename;
        $this->phpUtil  = $phpUtil ?: AbstractPhpProcess::factory();
    }

    /**
     * Counts the number of test cases executed by run(TestResult result).
     */
    public function count(): int
    {
        return 1;
    }

    /**
     * Runs a test and collects its result in a TestResult instance.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws CoveredCodeNotExecutedException
     * @throws Exception
     * @throws InvalidArgumentException
     * @throws MissingCoversAnnotationException
     * @throws RuntimeException
     * @throws UnintentionallyCoveredCodeException
     */
    public function run(?TestResult $result = null): TestResult
=======
     * @throws Exception
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
            $result = new TestResult;
        }

        try {
            $sections = $this->parse();
        } catch (Exception $e) {
            $result->startTest($this);
            $result->addFailure($this, new SkippedTestError($e->getMessage()), 0);
            $result->endTest($this, 0);

            return $result;
        }

        $code     = $this->render($sections['FILE']);
        $xfail    = false;
<<<<<<< HEAD
        $settings = $this->parseIniSection($this->settings($result->getCollectCodeCoverageInformation()));
=======
        $settings = $this->parseIniSection(self::SETTINGS);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $result->startTest($this);

        if (isset($sections['INI'])) {
            $settings = $this->parseIniSection($sections['INI'], $settings);
        }

        if (isset($sections['ENV'])) {
            $env = $this->parseEnvSection($sections['ENV']);
            $this->phpUtil->setEnv($env);
        }

        $this->phpUtil->setUseStderrRedirection(true);

        if ($result->enforcesTimeLimit()) {
            $this->phpUtil->setTimeout($result->getTimeoutForLargeTests());
        }

        $skip = $this->runSkip($sections, $result, $settings);

        if ($skip) {
            return $result;
        }

        if (isset($sections['XFAIL'])) {
<<<<<<< HEAD
            $xfail = trim($sections['XFAIL']);
=======
            $xfail = \trim($sections['XFAIL']);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (isset($sections['STDIN'])) {
            $this->phpUtil->setStdin($sections['STDIN']);
        }

        if (isset($sections['ARGS'])) {
            $this->phpUtil->setArgs($sections['ARGS']);
        }

        if ($result->getCollectCodeCoverageInformation()) {
            $this->renderForCoverage($code);
        }

        Timer::start();

        $jobResult    = $this->phpUtil->runJob($code, $this->stringifyIni($settings));
        $time         = Timer::stop();
        $this->output = $jobResult['stdout'] ?? '';

        if ($result->getCollectCodeCoverageInformation() && ($coverage = $this->cleanupForCoverage())) {
            $result->getCodeCoverage()->append($coverage, $this, true, [], [], true);
        }

        try {
            $this->assertPhptExpectation($sections, $this->output);
        } catch (AssertionFailedError $e) {
            $failure = $e;

            if ($xfail !== false) {
                $failure = new IncompleteTestError($xfail, 0, $e);
            } elseif ($e instanceof ExpectationFailedException) {
                $comparisonFailure = $e->getComparisonFailure();

                if ($comparisonFailure) {
                    $diff = $comparisonFailure->getDiff();
                } else {
                    $diff = $e->getMessage();
                }

                $hint    = $this->getLocationHintFromDiff($diff, $sections);
<<<<<<< HEAD
                $trace   = array_merge($hint, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
=======
                $trace   = \array_merge($hint, \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $failure = new PHPTAssertionFailedError(
                    $e->getMessage(),
                    0,
                    $trace[0]['file'],
                    $trace[0]['line'],
                    $trace,
                    $comparisonFailure ? $diff : ''
                );
            }

            $result->addFailure($this, $failure, $time);
        } catch (Throwable $t) {
            $result->addError($this, $t, $time);
        }

        if ($xfail !== false && $result->allCompletelyImplemented()) {
            $result->addFailure($this, new IncompleteTestError('XFAIL section but test passes'), $time);
        }

<<<<<<< HEAD
        $this->runClean($sections, $result->getCollectCodeCoverageInformation());
=======
        $this->runClean($sections);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $result->endTest($this, $time);

        return $result;
    }

    /**
     * Returns the name of the test case.
     */
    public function getName(): string
    {
        return $this->toString();
    }

    /**
     * Returns a string representation of the test case.
     */
    public function toString(): string
    {
        return $this->filename;
    }

    public function usesDataProvider(): bool
    {
        return false;
    }

    public function getNumAssertions(): int
    {
        return 1;
    }

    public function getActualOutput(): string
    {
        return $this->output;
    }

    public function hasOutput(): bool
    {
        return !empty($this->output);
    }

    /**
     * Parse --INI-- section key value pairs and return as array.
     *
     * @param array|string
     */
    private function parseIniSection($content, $ini = []): array
    {
<<<<<<< HEAD
        if (is_string($content)) {
            $content = explode("\n", trim($content));
        }

        foreach ($content as $setting) {
            if (strpos($setting, '=') === false) {
                continue;
            }

            $setting = explode('=', $setting, 2);
            $name    = trim($setting[0]);
            $value   = trim($setting[1]);
=======
        if (\is_string($content)) {
            $content = \explode("\n", \trim($content));
        }

        foreach ($content as $setting) {
            if (\strpos($setting, '=') === false) {
                continue;
            }

            $setting = \explode('=', $setting, 2);
            $name    = \trim($setting[0]);
            $value   = \trim($setting[1]);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if ($name === 'extension' || $name === 'zend_extension') {
                if (!isset($ini[$name])) {
                    $ini[$name] = [];
                }

                $ini[$name][] = $value;

                continue;
            }

            $ini[$name] = $value;
        }

        return $ini;
    }

    private function parseEnvSection(string $content): array
    {
        $env = [];

<<<<<<< HEAD
        foreach (explode("\n", trim($content)) as $e) {
            $e = explode('=', trim($e), 2);
=======
        foreach (\explode("\n", \trim($content)) as $e) {
            $e = \explode('=', \trim($e), 2);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if (!empty($e[0]) && isset($e[1])) {
                $env[$e[0]] = $e[1];
            }
        }

        return $env;
    }

    /**
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
=======
     * @throws ExpectationFailedException
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private function assertPhptExpectation(array $sections, string $output): void
    {
        $assertions = [
            'EXPECT'      => 'assertEquals',
            'EXPECTF'     => 'assertStringMatchesFormat',
            'EXPECTREGEX' => 'assertRegExp',
        ];

<<<<<<< HEAD
        $actual = preg_replace('/\r\n/', "\n", trim($output));

        foreach ($assertions as $sectionName => $sectionAssertion) {
            if (isset($sections[$sectionName])) {
                $sectionContent = preg_replace('/\r\n/', "\n", trim($sections[$sectionName]));
=======
        $actual = \preg_replace('/\r\n/', "\n", \trim($output));

        foreach ($assertions as $sectionName => $sectionAssertion) {
            if (isset($sections[$sectionName])) {
                $sectionContent = \preg_replace('/\r\n/', "\n", \trim($sections[$sectionName]));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $expected       = $sectionName === 'EXPECTREGEX' ? "/{$sectionContent}/" : $sectionContent;

                if ($expected === null) {
                    throw new Exception('No PHPT expectation found');
                }

                Assert::$sectionAssertion($expected, $actual);

                return;
            }
        }

        throw new Exception('No PHPT assertion found');
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    private function runSkip(array &$sections, TestResult $result, array $settings): bool
    {
        if (!isset($sections['SKIPIF'])) {
            return false;
        }

        $skipif    = $this->render($sections['SKIPIF']);
        $jobResult = $this->phpUtil->runJob($skipif, $this->stringifyIni($settings));

<<<<<<< HEAD
        if (!strncasecmp('skip', ltrim($jobResult['stdout']), 4)) {
            $message = '';

            if (preg_match('/^\s*skip\s*(.+)\s*/i', $jobResult['stdout'], $skipMatch)) {
                $message = substr($skipMatch[1], 2);
            }

            $hint  = $this->getLocationHint($message, $sections, 'SKIPIF');
            $trace = array_merge($hint, debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS));
=======
        if (!\strncasecmp('skip', \ltrim($jobResult['stdout']), 4)) {
            $message = '';

            if (\preg_match('/^\s*skip\s*(.+)\s*/i', $jobResult['stdout'], $skipMatch)) {
                $message = \substr($skipMatch[1], 2);
            }

            $hint  = $this->getLocationHint($message, $sections, 'SKIPIF');
            $trace = \array_merge($hint, \debug_backtrace(\DEBUG_BACKTRACE_IGNORE_ARGS));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $result->addFailure(
                $this,
                new SyntheticSkippedError($message, 0, $trace[0]['file'], $trace[0]['line'], $trace),
                0
            );
            $result->endTest($this, 0);

            return true;
        }

        return false;
    }

<<<<<<< HEAD
    private function runClean(array &$sections, bool $collectCoverage): void
=======
    private function runClean(array &$sections): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->phpUtil->setStdin('');
        $this->phpUtil->setArgs('');

        if (isset($sections['CLEAN'])) {
            $cleanCode = $this->render($sections['CLEAN']);

<<<<<<< HEAD
            $this->phpUtil->runJob($cleanCode, $this->settings($collectCoverage));
=======
            $this->phpUtil->runJob($cleanCode, self::SETTINGS);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
    }

    /**
     * @throws Exception
     */
    private function parse(): array
    {
        $sections = [];
        $section  = '';

        $unsupportedSections = [
            'CGI',
            'COOKIE',
            'DEFLATE_POST',
            'EXPECTHEADERS',
            'EXTENSIONS',
            'GET',
            'GZIP_POST',
            'HEADERS',
            'PHPDBG',
            'POST',
            'POST_RAW',
            'PUT',
            'REDIRECTTEST',
            'REQUEST',
        ];

        $lineNr = 0;

<<<<<<< HEAD
        foreach (file($this->filename) as $line) {
            $lineNr++;

            if (preg_match('/^--([_A-Z]+)--/', $line, $result)) {
=======
        foreach (\file($this->filename) as $line) {
            $lineNr++;

            if (\preg_match('/^--([_A-Z]+)--/', $line, $result)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $section                        = $result[1];
                $sections[$section]             = '';
                $sections[$section . '_offset'] = $lineNr;

                continue;
            }

            if (empty($section)) {
                throw new Exception('Invalid PHPT file: empty section header');
            }

            $sections[$section] .= $line;
        }

        if (isset($sections['FILEEOF'])) {
<<<<<<< HEAD
            $sections['FILE'] = rtrim($sections['FILEEOF'], "\r\n");
=======
            $sections['FILE'] = \rtrim($sections['FILEEOF'], "\r\n");
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            unset($sections['FILEEOF']);
        }

        $this->parseExternal($sections);

        if (!$this->validate($sections)) {
            throw new Exception('Invalid PHPT file');
        }

        foreach ($unsupportedSections as $section) {
            if (isset($sections[$section])) {
                throw new Exception(
<<<<<<< HEAD
                    "PHPUnit does not support PHPT {$section} sections"
=======
                    "PHPUnit does not support PHPT $section sections"
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                );
            }
        }

        return $sections;
    }

    /**
     * @throws Exception
     */
    private function parseExternal(array &$sections): void
    {
        $allowSections = [
            'FILE',
            'EXPECT',
            'EXPECTF',
            'EXPECTREGEX',
        ];
<<<<<<< HEAD
        $testDirectory = dirname($this->filename) . DIRECTORY_SEPARATOR;

        foreach ($allowSections as $section) {
            if (isset($sections[$section . '_EXTERNAL'])) {
                $externalFilename = trim($sections[$section . '_EXTERNAL']);

                if (!is_file($testDirectory . $externalFilename) ||
                    !is_readable($testDirectory . $externalFilename)) {
                    throw new Exception(
                        sprintf(
=======
        $testDirectory = \dirname($this->filename) . \DIRECTORY_SEPARATOR;

        foreach ($allowSections as $section) {
            if (isset($sections[$section . '_EXTERNAL'])) {
                $externalFilename = \trim($sections[$section . '_EXTERNAL']);

                if (!\is_file($testDirectory . $externalFilename) ||
                    !\is_readable($testDirectory . $externalFilename)) {
                    throw new Exception(
                        \sprintf(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            'Could not load --%s-- %s for PHPT file',
                            $section . '_EXTERNAL',
                            $testDirectory . $externalFilename
                        )
                    );
                }

<<<<<<< HEAD
                $sections[$section] = file_get_contents($testDirectory . $externalFilename);
=======
                $sections[$section] = \file_get_contents($testDirectory . $externalFilename);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }

    private function validate(array &$sections): bool
    {
        $requiredSections = [
            'FILE',
            [
                'EXPECT',
                'EXPECTF',
                'EXPECTREGEX',
            ],
        ];

        foreach ($requiredSections as $section) {
<<<<<<< HEAD
            if (is_array($section)) {
=======
            if (\is_array($section)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $foundSection = false;

                foreach ($section as $anySection) {
                    if (isset($sections[$anySection])) {
                        $foundSection = true;

                        break;
                    }
                }

                if (!$foundSection) {
                    return false;
                }

                continue;
            }

            if (!isset($sections[$section])) {
                return false;
            }
        }

        return true;
    }

    private function render(string $code): string
    {
<<<<<<< HEAD
        return str_replace(
=======
        return \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            [
                '__DIR__',
                '__FILE__',
            ],
            [
<<<<<<< HEAD
                "'" . dirname($this->filename) . "'",
=======
                "'" . \dirname($this->filename) . "'",
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                "'" . $this->filename . "'",
            ],
            $code
        );
    }

    private function getCoverageFiles(): array
    {
<<<<<<< HEAD
        $baseDir  = dirname(realpath($this->filename)) . DIRECTORY_SEPARATOR;
        $basename = basename($this->filename, 'phpt');
=======
        $baseDir  = \dirname(\realpath($this->filename)) . \DIRECTORY_SEPARATOR;
        $basename = \basename($this->filename, 'phpt');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return [
            'coverage' => $baseDir . $basename . 'coverage',
            'job'      => $baseDir . $basename . 'php',
        ];
    }

    private function renderForCoverage(string &$job): void
    {
        $files = $this->getCoverageFiles();

        $template = new Text_Template(
            __DIR__ . '/../Util/PHP/Template/PhptTestCase.tpl'
        );

        $composerAutoload = '\'\'';

<<<<<<< HEAD
        if (defined('PHPUNIT_COMPOSER_INSTALL')) {
            $composerAutoload = var_export(PHPUNIT_COMPOSER_INSTALL, true);
=======
        if (\defined('PHPUNIT_COMPOSER_INSTALL') && !\defined('PHPUNIT_TESTSUITE')) {
            $composerAutoload = \var_export(PHPUNIT_COMPOSER_INSTALL, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $phar = '\'\'';

<<<<<<< HEAD
        if (defined('__PHPUNIT_PHAR__')) {
            $phar = var_export(__PHPUNIT_PHAR__, true);
=======
        if (\defined('__PHPUNIT_PHAR__')) {
            $phar = \var_export(__PHPUNIT_PHAR__, true);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $globals = '';

        if (!empty($GLOBALS['__PHPUNIT_BOOTSTRAP'])) {
<<<<<<< HEAD
            $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . var_export(
=======
            $globals = '$GLOBALS[\'__PHPUNIT_BOOTSTRAP\'] = ' . \var_export(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $GLOBALS['__PHPUNIT_BOOTSTRAP'],
                true
            ) . ";\n";
        }

        $template->setVar(
            [
                'composerAutoload' => $composerAutoload,
                'phar'             => $phar,
                'globals'          => $globals,
                'job'              => $files['job'],
                'coverageFile'     => $files['coverage'],
            ]
        );

<<<<<<< HEAD
        file_put_contents($files['job'], $job);
=======
        \file_put_contents($files['job'], $job);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $job = $template->render();
    }

    private function cleanupForCoverage(): array
    {
<<<<<<< HEAD
        $coverage = [];
        $files    = $this->getCoverageFiles();

        if (file_exists($files['coverage'])) {
            $buffer = @file_get_contents($files['coverage']);

            if ($buffer !== false) {
                $coverage = @unserialize($buffer);

                if ($coverage === false) {
                    $coverage = [];
                }
            }
        }

        foreach ($files as $file) {
            @unlink($file);
=======
        $files    = $this->getCoverageFiles();
        $coverage = @\unserialize(\file_get_contents($files['coverage']));

        if ($coverage === false) {
            $coverage = [];
        }

        foreach ($files as $file) {
            @\unlink($file);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $coverage;
    }

    private function stringifyIni(array $ini): array
    {
        $settings = [];

        foreach ($ini as $key => $value) {
<<<<<<< HEAD
            if (is_array($value)) {
=======
            if (\is_array($value)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                foreach ($value as $val) {
                    $settings[] = $key . '=' . $val;
                }

                continue;
            }

            $settings[] = $key . '=' . $value;
        }

        return $settings;
    }

    private function getLocationHintFromDiff(string $message, array $sections): array
    {
        $needle       = '';
        $previousLine = '';
        $block        = 'message';

<<<<<<< HEAD
        foreach (preg_split('/\r\n|\r|\n/', $message) as $line) {
            $line = trim($line);
=======
        foreach (\preg_split('/\r\n|\r|\n/', $message) as $line) {
            $line = \trim($line);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

            if ($block === 'message' && $line === '--- Expected') {
                $block = 'expected';
            }

            if ($block === 'expected' && $line === '@@ @@') {
                $block = 'diff';
            }

            if ($block === 'diff') {
<<<<<<< HEAD
                if (strpos($line, '+') === 0) {
=======
                if (\strpos($line, '+') === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $needle = $this->getCleanDiffLine($previousLine);

                    break;
                }

<<<<<<< HEAD
                if (strpos($line, '-') === 0) {
=======
                if (\strpos($line, '-') === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    $needle = $this->getCleanDiffLine($line);

                    break;
                }
            }

            if (!empty($line)) {
                $previousLine = $line;
            }
        }

        return $this->getLocationHint($needle, $sections);
    }

    private function getCleanDiffLine(string $line): string
    {
<<<<<<< HEAD
        if (preg_match('/^[\-+]([\'\"]?)(.*)\1$/', $line, $matches)) {
=======
        if (\preg_match('/^[\-+]([\'\"]?)(.*)\1$/', $line, $matches)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $line = $matches[2];
        }

        return $line;
    }

    private function getLocationHint(string $needle, array $sections, ?string $sectionName = null): array
    {
<<<<<<< HEAD
        $needle = trim($needle);

        if (empty($needle)) {
            return [[
                'file' => realpath($this->filename),
=======
        $needle = \trim($needle);

        if (empty($needle)) {
            return [[
                'file' => \realpath($this->filename),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'line' => 1,
            ]];
        }

        if ($sectionName) {
            $search = [$sectionName];
        } else {
            $search = [
                // 'FILE',
                'EXPECT',
                'EXPECTF',
                'EXPECTREGEX',
            ];
        }

        foreach ($search as $section) {
            if (!isset($sections[$section])) {
                continue;
            }

            if (isset($sections[$section . '_EXTERNAL'])) {
<<<<<<< HEAD
                $externalFile = trim($sections[$section . '_EXTERNAL']);

                return [
                    [
                        'file' => realpath(dirname($this->filename) . DIRECTORY_SEPARATOR . $externalFile),
                        'line' => 1,
                    ],
                    [
                        'file' => realpath($this->filename),
=======
                $externalFile = \trim($sections[$section . '_EXTERNAL']);

                return [
                    [
                        'file' => \realpath(\dirname($this->filename) . \DIRECTORY_SEPARATOR . $externalFile),
                        'line' => 1,
                    ],
                    [
                        'file' => \realpath($this->filename),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'line' => ($sections[$section . '_EXTERNAL_offset'] ?? 0) + 1,
                    ],
                ];
            }

            $sectionOffset = $sections[$section . '_offset'] ?? 0;
            $offset        = $sectionOffset + 1;

<<<<<<< HEAD
            foreach (preg_split('/\r\n|\r|\n/', $sections[$section]) as $line) {
                if (strpos($line, $needle) !== false) {
                    return [[
                        'file' => realpath($this->filename),
=======
            foreach (\preg_split('/\r\n|\r|\n/', $sections[$section]) as $line) {
                if (\strpos($line, $needle) !== false) {
                    return [[
                        'file' => \realpath($this->filename),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                        'line' => $offset,
                    ]];
                }
                $offset++;
            }
        }

        if ($sectionName) {
            // String not found in specified section, show user the start of the named section
            return [[
<<<<<<< HEAD
                'file' => realpath($this->filename),
=======
                'file' => \realpath($this->filename),
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                'line' => $sectionOffset,
            ]];
        }

        // No section specified, show user start of code
        return [[
<<<<<<< HEAD
            'file' => realpath($this->filename),
            'line' => 1,
        ]];
    }

    /**
     * @psalm-return list<string>
     */
    private function settings(bool $collectCoverage): array
    {
        $settings = [
            'allow_url_fopen=1',
            'auto_append_file=',
            'auto_prepend_file=',
            'disable_functions=',
            'display_errors=1',
            'docref_ext=.html',
            'docref_root=',
            'error_append_string=',
            'error_prepend_string=',
            'error_reporting=-1',
            'html_errors=0',
            'log_errors=0',
            'open_basedir=',
            'output_buffering=Off',
            'output_handler=',
            'report_memleaks=0',
            'report_zend_debug=0',
        ];

        if (extension_loaded('pcov')) {
            if ($collectCoverage) {
                $settings[] = 'pcov.enabled=1';
            } else {
                $settings[] = 'pcov.enabled=0';
            }
        }

        if (extension_loaded('xdebug')) {
            if (version_compare(phpversion('xdebug'), '3', '>=')) {
                if ($collectCoverage) {
                    $settings[] = 'xdebug.mode=coverage';
                } else {
                    $settings[] = 'xdebug.mode=off';
                }
            } else {
                $settings[] = 'xdebug.default_enable=0';

                if ($collectCoverage) {
                    $settings[] = 'xdebug.coverage_enable=1';
                }
            }
        }

        return $settings;
    }
=======
            'file' => \realpath($this->filename),
            'line' => 1,
        ]];
    }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
