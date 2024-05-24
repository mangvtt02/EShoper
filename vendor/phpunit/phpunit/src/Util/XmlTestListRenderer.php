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
use function get_class;
use function implode;
use function str_replace;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\PhptTestCase;
use RecursiveIteratorIterator;
use SebastianBergmann\RecursionContext\InvalidArgumentException;
use XMLWriter;
=======
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\TestSuite;
use PHPUnit\Runner\PhptTestCase;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class XmlTestListRenderer
{
    /**
<<<<<<< HEAD
     * @throws InvalidArgumentException
     */
    public function render(TestSuite $suite): string
    {
        $writer = new XMLWriter;

        $writer->openMemory();
        $writer->setIndent(true);
        $writer->startDocument('1.0', 'UTF-8');
=======
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function render(TestSuite $suite): string
    {
        $writer = new \XMLWriter;

        $writer->openMemory();
        $writer->setIndent(true);
        $writer->startDocument();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $writer->startElement('tests');

        $currentTestCase = null;

<<<<<<< HEAD
        foreach (new RecursiveIteratorIterator($suite->getIterator()) as $test) {
            if ($test instanceof TestCase) {
                if (get_class($test) !== $currentTestCase) {
=======
        foreach (new \RecursiveIteratorIterator($suite->getIterator()) as $test) {
            if ($test instanceof TestCase) {
                if (\get_class($test) !== $currentTestCase) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    if ($currentTestCase !== null) {
                        $writer->endElement();
                    }

                    $writer->startElement('testCaseClass');
<<<<<<< HEAD
                    $writer->writeAttribute('name', get_class($test));

                    $currentTestCase = get_class($test);
=======
                    $writer->writeAttribute('name', \get_class($test));

                    $currentTestCase = \get_class($test);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                }

                $writer->startElement('testCaseMethod');
                $writer->writeAttribute('name', $test->getName(false));
<<<<<<< HEAD
                $writer->writeAttribute('groups', implode(',', $test->getGroups()));
=======
                $writer->writeAttribute('groups', \implode(',', $test->getGroups()));
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

                if (!empty($test->getDataSetAsString(false))) {
                    $writer->writeAttribute(
                        'dataSet',
<<<<<<< HEAD
                        str_replace(
=======
                        \str_replace(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                            ' with data set ',
                            '',
                            $test->getDataSetAsString(false)
                        )
                    );
                }

                $writer->endElement();
            } elseif ($test instanceof PhptTestCase) {
                if ($currentTestCase !== null) {
                    $writer->endElement();

                    $currentTestCase = null;
                }

                $writer->startElement('phptFile');
                $writer->writeAttribute('path', $test->getName());
                $writer->endElement();
            }
        }

        if ($currentTestCase !== null) {
            $writer->endElement();
        }

        $writer->endElement();
<<<<<<< HEAD
        $writer->endDocument();
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        return $writer->outputMemory();
    }
}
