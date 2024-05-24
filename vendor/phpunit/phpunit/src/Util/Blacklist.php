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
use function class_exists;
use function defined;
use function dirname;
use function strpos;
use function sys_get_temp_dir;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Composer\Autoload\ClassLoader;
use DeepCopy\DeepCopy;
use Doctrine\Instantiator\Instantiator;
use PharIo\Manifest\Manifest;
use PharIo\Version\Version as PharIoVersion;
use PHP_Token;
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;
use ReflectionClass;
use ReflectionException;
=======
use phpDocumentor\Reflection\DocBlock;
use phpDocumentor\Reflection\Project;
use phpDocumentor\Reflection\Type;
use PHPUnit\Framework\TestCase;
use Prophecy\Prophet;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\CodeCoverage\CodeCoverage;
use SebastianBergmann\CodeUnitReverseLookup\Wizard;
use SebastianBergmann\Comparator\Comparator;
use SebastianBergmann\Diff\Diff;
use SebastianBergmann\Environment\Runtime;
use SebastianBergmann\Exporter\Exporter;
use SebastianBergmann\FileIterator\Facade as FileIteratorFacade;
use SebastianBergmann\GlobalState\Snapshot;
use SebastianBergmann\Invoker\Invoker;
use SebastianBergmann\ObjectEnumerator\Enumerator;
<<<<<<< HEAD
use SebastianBergmann\ObjectReflector\ObjectReflector;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use SebastianBergmann\RecursionContext\Context;
use SebastianBergmann\ResourceOperations\ResourceOperations;
use SebastianBergmann\Timer\Timer;
use SebastianBergmann\Type\TypeName;
use SebastianBergmann\Version;
use Text_Template;
use TheSeer\Tokenizer\Tokenizer;
<<<<<<< HEAD
=======
use Webmozart\Assert\Assert;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Blacklist
{
    /**
     * @var array<string,int>
     */
    public static $blacklistedClassNames = [
        // composer
        ClassLoader::class => 1,

        // doctrine/instantiator
        Instantiator::class => 1,

        // myclabs/deepcopy
        DeepCopy::class => 1,

        // phar-io/manifest
        Manifest::class => 1,

        // phar-io/version
        PharIoVersion::class => 1,

<<<<<<< HEAD
        // phpdocumentor/type-resolver
        Type::class => 1,

=======
        // phpdocumentor/reflection-common
        Project::class => 1,

        // phpdocumentor/reflection-docblock
        DocBlock::class => 1,

        // phpdocumentor/type-resolver
        Type::class => 1,

        // phpspec/prophecy
        Prophet::class => 1,

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // phpunit/phpunit
        TestCase::class => 2,

        // phpunit/php-code-coverage
        CodeCoverage::class => 1,

        // phpunit/php-file-iterator
        FileIteratorFacade::class => 1,

        // phpunit/php-invoker
        Invoker::class => 1,

        // phpunit/php-text-template
        Text_Template::class => 1,

        // phpunit/php-timer
        Timer::class => 1,

        // phpunit/php-token-stream
        PHP_Token::class => 1,

        // sebastian/code-unit-reverse-lookup
        Wizard::class => 1,

        // sebastian/comparator
        Comparator::class => 1,

        // sebastian/diff
        Diff::class => 1,

        // sebastian/environment
        Runtime::class => 1,

        // sebastian/exporter
        Exporter::class => 1,

        // sebastian/global-state
        Snapshot::class => 1,

        // sebastian/object-enumerator
        Enumerator::class => 1,

<<<<<<< HEAD
        // sebastian/object-reflector
        ObjectReflector::class => 1,

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        // sebastian/recursion-context
        Context::class => 1,

        // sebastian/resource-operations
        ResourceOperations::class => 1,

        // sebastian/type
        TypeName::class => 1,

        // sebastian/version
        Version::class => 1,

        // theseer/tokenizer
        Tokenizer::class => 1,
<<<<<<< HEAD
=======

        // webmozart/assert
        Assert::class => 1,
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    ];

    /**
     * @var string[]
     */
    private static $directories;

    /**
     * @throws Exception
     *
     * @return string[]
     */
    public function getBlacklistedDirectories(): array
    {
        $this->initialize();

        return self::$directories;
    }

    /**
     * @throws Exception
     */
    public function isBlacklisted(string $file): bool
    {
<<<<<<< HEAD
        if (defined('PHPUNIT_TESTSUITE')) {
=======
        if (\defined('PHPUNIT_TESTSUITE')) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            return false;
        }

        $this->initialize();

        foreach (self::$directories as $directory) {
<<<<<<< HEAD
            if (strpos($file, $directory) === 0) {
=======
            if (\strpos($file, $directory) === 0) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return true;
            }
        }

        return false;
    }

    /**
     * @throws Exception
     */
    private function initialize(): void
    {
        if (self::$directories === null) {
            self::$directories = [];

            foreach (self::$blacklistedClassNames as $className => $parent) {
<<<<<<< HEAD
                if (!class_exists($className)) {
=======
                if (!\class_exists($className)) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    continue;
                }

                try {
<<<<<<< HEAD
                    $directory = (new ReflectionClass($className))->getFileName();
                    // @codeCoverageIgnoreStart
                } catch (ReflectionException $e) {
                    throw new Exception(
                        $e->getMessage(),
                        $e->getCode(),
=======
                    $directory = (new \ReflectionClass($className))->getFileName();
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

                for ($i = 0; $i < $parent; $i++) {
<<<<<<< HEAD
                    $directory = dirname($directory);
=======
                    $directory = \dirname($directory);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                self::$directories[] = $directory;
            }

            // Hide process isolation workaround on Windows.
<<<<<<< HEAD
            if (DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see https://php.net/manual/en/function.tempnam.php
                self::$directories[] = sys_get_temp_dir() . '\\PHP';
=======
            if (\DIRECTORY_SEPARATOR === '\\') {
                // tempnam() prefix is limited to first 3 chars.
                // @see https://php.net/manual/en/function.tempnam.php
                self::$directories[] = \sys_get_temp_dir() . '\\PHP';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            }
        }
    }
}
