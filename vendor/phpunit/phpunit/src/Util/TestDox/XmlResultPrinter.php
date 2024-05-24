<?php declare(strict_types=1);
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace PHPUnit\Util\TestDox;

<<<<<<< HEAD
use function array_filter;
use function get_class;
use function implode;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use DOMDocument;
use DOMElement;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\Test;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestListener;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Framework\Warning;
use PHPUnit\Util\Printer;
<<<<<<< HEAD
use ReflectionClass;
use ReflectionException;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use Throwable;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class XmlResultPrinter extends Printer implements TestListener
{
    /**
     * @var DOMDocument
     */
    private $document;

    /**
     * @var DOMElement
     */
    private $root;

    /**
     * @var NamePrettifier
     */
    private $prettifier;

    /**
<<<<<<< HEAD
     * @var null|Throwable
=======
     * @var null|\Throwable
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    private $exception;

    /**
     * @param resource|string $out
     *
     * @throws Exception
     */
    public function __construct($out = null)
    {
        $this->document               = new DOMDocument('1.0', 'UTF-8');
        $this->document->formatOutput = true;

        $this->root = $this->document->createElement('tests');
        $this->document->appendChild($this->root);

        $this->prettifier = new NamePrettifier;

        parent::__construct($out);
    }

    /**
     * Flush buffer and close output.
     */
    public function flush(): void
    {
        $this->write($this->document->saveXML());

        parent::flush();
    }

    /**
     * An error occurred.
     */
<<<<<<< HEAD
    public function addError(Test $test, Throwable $t, float $time): void
=======
    public function addError(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $this->exception = $t;
    }

    /**
     * A warning occurred.
     */
    public function addWarning(Test $test, Warning $e, float $time): void
    {
    }

    /**
     * A failure occurred.
     */
    public function addFailure(Test $test, AssertionFailedError $e, float $time): void
    {
        $this->exception = $e;
    }

    /**
     * Incomplete test.
     */
<<<<<<< HEAD
    public function addIncompleteTest(Test $test, Throwable $t, float $time): void
=======
    public function addIncompleteTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
    }

    /**
     * Risky test.
     */
<<<<<<< HEAD
    public function addRiskyTest(Test $test, Throwable $t, float $time): void
=======
    public function addRiskyTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
    }

    /**
     * Skipped test.
     */
<<<<<<< HEAD
    public function addSkippedTest(Test $test, Throwable $t, float $time): void
=======
    public function addSkippedTest(Test $test, \Throwable $t, float $time): void
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
    }

    /**
     * A test suite started.
     */
    public function startTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test suite ended.
     */
    public function endTestSuite(TestSuite $suite): void
    {
    }

    /**
     * A test started.
     */
    public function startTest(Test $test): void
    {
        $this->exception = null;
    }

    /**
     * A test ended.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function endTest(Test $test, float $time): void
    {
        if (!$test instanceof TestCase) {
            return;
        }

<<<<<<< HEAD
        $groups = array_filter(
            $test->getGroups(),
            static function ($group)
            {
=======
        $groups = \array_filter(
            $test->getGroups(),
            static function ($group) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                return !($group === 'small' || $group === 'medium' || $group === 'large');
            }
        );

        $testNode = $this->document->createElement('test');

<<<<<<< HEAD
        $testNode->setAttribute('className', get_class($test));
        $testNode->setAttribute('methodName', $test->getName());
        $testNode->setAttribute('prettifiedClassName', $this->prettifier->prettifyTestClass(get_class($test)));
=======
        $testNode->setAttribute('className', \get_class($test));
        $testNode->setAttribute('methodName', $test->getName());
        $testNode->setAttribute('prettifiedClassName', $this->prettifier->prettifyTestClass(\get_class($test)));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $testNode->setAttribute('prettifiedMethodName', $this->prettifier->prettifyTestCase($test));
        $testNode->setAttribute('status', (string) $test->getStatus());
        $testNode->setAttribute('time', (string) $time);
        $testNode->setAttribute('size', (string) $test->getSize());
<<<<<<< HEAD
        $testNode->setAttribute('groups', implode(',', $groups));
=======
        $testNode->setAttribute('groups', \implode(',', $groups));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        foreach ($groups as $group) {
            $groupNode = $this->document->createElement('group');

            $groupNode->setAttribute('name', $group);

            $testNode->appendChild($groupNode);
        }

        $annotations = $test->getAnnotations();

        foreach (['class', 'method'] as $type) {
            foreach ($annotations[$type] as $annotation => $values) {
                if ($annotation !== 'covers' && $annotation !== 'uses') {
                    continue;
                }

                foreach ($values as $value) {
                    $coversNode = $this->document->createElement($annotation);

                    $coversNode->setAttribute('target', $value);

                    $testNode->appendChild($coversNode);
                }
            }
        }

        foreach ($test->doubledTypes() as $doubledType) {
            $testDoubleNode = $this->document->createElement('testDouble');

            $testDoubleNode->setAttribute('type', $doubledType);

            $testNode->appendChild($testDoubleNode);
        }

<<<<<<< HEAD
        $inlineAnnotations = \PHPUnit\Util\Test::getInlineAnnotations(get_class($test), $test->getName(false));
=======
        $inlineAnnotations = \PHPUnit\Util\Test::getInlineAnnotations(\get_class($test), $test->getName(false));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        if (isset($inlineAnnotations['given'], $inlineAnnotations['when'], $inlineAnnotations['then'])) {
            $testNode->setAttribute('given', $inlineAnnotations['given']['value']);
            $testNode->setAttribute('givenStartLine', (string) $inlineAnnotations['given']['line']);
            $testNode->setAttribute('when', $inlineAnnotations['when']['value']);
            $testNode->setAttribute('whenStartLine', (string) $inlineAnnotations['when']['line']);
            $testNode->setAttribute('then', $inlineAnnotations['then']['value']);
            $testNode->setAttribute('thenStartLine', (string) $inlineAnnotations['then']['line']);
        }

        if ($this->exception !== null) {
            if ($this->exception instanceof Exception) {
                $steps = $this->exception->getSerializableTrace();
            } else {
                $steps = $this->exception->getTrace();
            }

            try {
<<<<<<< HEAD
                $file = (new ReflectionClass($test))->getFileName();
                // @codeCoverageIgnoreStart
            } catch (ReflectionException $e) {
                throw new Exception(
                    $e->getMessage(),
                    $e->getCode(),
=======
                $file = (new \ReflectionClass($test))->getFileName();
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

            foreach ($steps as $step) {
                if (isset($step['file']) && $step['file'] === $file) {
                    $testNode->setAttribute('exceptionLine', (string) $step['line']);

                    break;
                }
            }

            $testNode->setAttribute('exceptionMessage', $this->exception->getMessage());
        }

        $this->root->appendChild($testNode);
    }
}
