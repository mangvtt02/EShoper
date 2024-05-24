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
use const DIRECTORY_SEPARATOR;
use const LOCK_EX;
use function assert;
use function dirname;
use function file_get_contents;
use function file_put_contents;
use function in_array;
use function is_array;
use function is_dir;
use function is_file;
use function json_decode;
use function json_encode;
use function sprintf;
=======
use PHPUnit\Util\ErrorHandler;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use PHPUnit\Util\Filesystem;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
<<<<<<< HEAD
final class DefaultTestResultCache implements TestResultCache
{
    /**
     * @var int
     */
    private const VERSION = 1;

    /**
     * @psalm-var list<int>
     */
    private const ALLOWED_TEST_STATUSES = [
=======
final class DefaultTestResultCache implements \Serializable, TestResultCache
{
    /**
     * @var string
     */
    public const DEFAULT_RESULT_CACHE_FILENAME = '.phpunit.result.cache';

    /**
     * Provide extra protection against incomplete or corrupt caches
     *
     * @var int[]
     */
    private const ALLOWED_CACHE_TEST_STATUSES = [
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        BaseTestRunner::STATUS_SKIPPED,
        BaseTestRunner::STATUS_INCOMPLETE,
        BaseTestRunner::STATUS_FAILURE,
        BaseTestRunner::STATUS_ERROR,
        BaseTestRunner::STATUS_RISKY,
        BaseTestRunner::STATUS_WARNING,
    ];

    /**
<<<<<<< HEAD
     * @var string
     */
    private const DEFAULT_RESULT_CACHE_FILENAME = '.phpunit.result.cache';

    /**
=======
     * Path and filename for result cache file
     *
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @var string
     */
    private $cacheFilename;

    /**
<<<<<<< HEAD
     * @psalm-var array<string, int>
=======
     * The list of defective tests
     *
     * <code>
     * // Mark a test skipped
     * $this->defects[$testName] = BaseTestRunner::TEST_SKIPPED;
     * </code>
     *
     * @var array<string, int>
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $defects = [];

    /**
<<<<<<< HEAD
     * @psalm-var array<string, float>
=======
     * The list of execution duration of suites and tests (in seconds)
     *
     * <code>
     * // Record running time for test
     * $this->times[$testName] = 1.234;
     * </code>
     *
     * @var array<string, float>
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $times = [];

    public function __construct(?string $filepath = null)
    {
<<<<<<< HEAD
        if ($filepath !== null && is_dir($filepath)) {
            $filepath .= DIRECTORY_SEPARATOR . self::DEFAULT_RESULT_CACHE_FILENAME;
=======
        if ($filepath !== null && \is_dir($filepath)) {
            // cache path provided, use default cache filename in that location
            $filepath .= \DIRECTORY_SEPARATOR . self::DEFAULT_RESULT_CACHE_FILENAME;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        $this->cacheFilename = $filepath ?? $_ENV['PHPUNIT_RESULT_CACHE'] ?? self::DEFAULT_RESULT_CACHE_FILENAME;
    }

<<<<<<< HEAD
    public function setState(string $testName, int $state): void
    {
        if (!in_array($state, self::ALLOWED_TEST_STATUSES, true)) {
            return;
        }

        $this->defects[$testName] = $state;
=======
    /**
     * @throws Exception
     */
    public function persist(): void
    {
        $this->saveToFile();
    }

    /**
     * @throws Exception
     */
    public function saveToFile(): void
    {
        if (\defined('PHPUNIT_TESTSUITE_RESULTCACHE')) {
            return;
        }

        if (!Filesystem::createDirectory(\dirname($this->cacheFilename))) {
            throw new Exception(
                \sprintf(
                    'Cannot create directory "%s" for result cache file',
                    $this->cacheFilename
                )
            );
        }

        \file_put_contents(
            $this->cacheFilename,
            \serialize($this)
        );
    }

    public function setState(string $testName, int $state): void
    {
        if ($state !== BaseTestRunner::STATUS_PASSED) {
            $this->defects[$testName] = $state;
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    public function getState(string $testName): int
    {
        return $this->defects[$testName] ?? BaseTestRunner::STATUS_UNKNOWN;
    }

    public function setTime(string $testName, float $time): void
    {
        $this->times[$testName] = $time;
    }

    public function getTime(string $testName): float
    {
        return $this->times[$testName] ?? 0.0;
    }

    public function load(): void
    {
<<<<<<< HEAD
        if (!is_file($this->cacheFilename)) {
            return;
        }

        $data = json_decode(
            file_get_contents($this->cacheFilename),
            true
        );

        if ($data === null) {
            return;
        }

        if (!isset($data['version'])) {
            return;
        }

        if ($data['version'] !== self::VERSION) {
            return;
        }

        assert(isset($data['defects']) && is_array($data['defects']));
        assert(isset($data['times']) && is_array($data['times']));

        $this->defects = $data['defects'];
        $this->times   = $data['times'];
    }

    /**
     * @throws Exception
     */
    public function persist(): void
    {
        if (!Filesystem::createDirectory(dirname($this->cacheFilename))) {
            throw new Exception(
                sprintf(
                    'Cannot create directory "%s" for result cache file',
                    $this->cacheFilename
                )
            );
        }

        file_put_contents(
            $this->cacheFilename,
            json_encode(
                [
                    'version' => self::VERSION,
                    'defects' => $this->defects,
                    'times'   => $this->times,
                ]
            ),
            LOCK_EX
        );
=======
        $this->clear();

        if (!\is_file($this->cacheFilename)) {
            return;
        }

        $cacheData = @\file_get_contents($this->cacheFilename);

        // @codeCoverageIgnoreStart
        if ($cacheData === false) {
            return;
        }
        // @codeCoverageIgnoreEnd

        $cache = ErrorHandler::invokeIgnoringWarnings(
            static function () use ($cacheData) {
                return @\unserialize($cacheData, ['allowed_classes' => [self::class]]);
            }
        );

        if ($cache === false) {
            return;
        }

        if ($cache instanceof self) {
            /* @var DefaultTestResultCache $cache */
            $cache->copyStateToCache($this);
        }
    }

    public function copyStateToCache(self $targetCache): void
    {
        foreach ($this->defects as $name => $state) {
            $targetCache->setState($name, $state);
        }

        foreach ($this->times as $name => $time) {
            $targetCache->setTime($name, $time);
        }
    }

    public function clear(): void
    {
        $this->defects = [];
        $this->times   = [];
    }

    public function serialize(): string
    {
        return \serialize([
            'defects' => $this->defects,
            'times'   => $this->times,
        ]);
    }

    /**
     * @param string $serialized
     */
    public function unserialize($serialized): void
    {
        $data = \unserialize($serialized);

        if (isset($data['times'])) {
            foreach ($data['times'] as $testName => $testTime) {
                \assert(\is_string($testName));
                \assert(\is_float($testTime));
                $this->times[$testName] = $testTime;
            }
        }

        if (isset($data['defects'])) {
            foreach ($data['defects'] as $testName => $testResult) {
                \assert(\is_string($testName));
                \assert(\is_int($testResult));

                if (\in_array($testResult, self::ALLOWED_CACHE_TEST_STATUSES, true)) {
                    $this->defects[$testName] = $testResult;
                }
            }
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
