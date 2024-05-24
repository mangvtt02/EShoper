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
use function str_replace;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class ConfigurationGenerator
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private const TEMPLATE = <<<'EOT'
=======
    private const TEMPLATE = <<<EOT
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
<?xml version="1.0" encoding="UTF-8"?>
<phpunit xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
         xsi:noNamespaceSchemaLocation="https://schema.phpunit.de/{phpunit_version}/phpunit.xsd"
         bootstrap="{bootstrap_script}"
<<<<<<< HEAD
         cacheResultFile="{cache_directory}/test-results"
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
         executionOrder="depends,defects"
         forceCoversAnnotation="true"
         beStrictAboutCoversAnnotation="true"
         beStrictAboutOutputDuringTests="true"
         beStrictAboutTodoAnnotatedTests="true"
<<<<<<< HEAD
         convertDeprecationsToExceptions="true"
         verbose="true">
    <testsuites>
        <testsuite name="default">
            <directory>{tests_directory}</directory>
=======
         verbose="true">
    <testsuites>
        <testsuite name="default">
            <directory suffix="Test.php">{tests_directory}</directory>
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        </testsuite>
    </testsuites>

    <filter>
        <whitelist processUncoveredFilesFromWhitelist="true">
            <directory suffix=".php">{src_directory}</directory>
        </whitelist>
    </filter>
</phpunit>

EOT;

<<<<<<< HEAD
    public function generateDefaultConfiguration(string $phpunitVersion, string $bootstrapScript, string $testsDirectory, string $srcDirectory, string $cacheDirectory): string
    {
        return str_replace(
=======
    public function generateDefaultConfiguration(string $phpunitVersion, string $bootstrapScript, string $testsDirectory, string $srcDirectory): string
    {
        return \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            [
                '{phpunit_version}',
                '{bootstrap_script}',
                '{tests_directory}',
                '{src_directory}',
<<<<<<< HEAD
                '{cache_directory}',
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ],
            [
                $phpunitVersion,
                $bootstrapScript,
                $testsDirectory,
                $srcDirectory,
<<<<<<< HEAD
                $cacheDirectory,
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            ],
            self::TEMPLATE
        );
    }
}
