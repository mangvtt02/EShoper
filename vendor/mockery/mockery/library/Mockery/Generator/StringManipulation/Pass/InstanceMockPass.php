<?php
<<<<<<< HEAD

/**
 * Mockery (https://docs.mockery.io/)
 *
 * @copyright https://github.com/mockery/mockery/blob/HEAD/COPYRIGHT.md
 * @license https://github.com/mockery/mockery/blob/HEAD/LICENSE BSD 3-Clause License
 * @link https://github.com/mockery/mockery for the canonical source repository
=======
/**
 * Mockery
 *
 * LICENSE
 *
 * This source file is subject to the new BSD license that is bundled
 * with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://github.com/padraic/mockery/blob/master/LICENSE
 * If you did not receive a copy of the license and are unable to
 * obtain it through the world-wide-web, please send an email
 * to padraic@php.net so we can send you a copy immediately.
 *
 * @category   Mockery
 * @package    Mockery
 * @copyright  Copyright (c) 2010 Pádraic Brady (http://blog.astrumfutura.com)
 * @license    http://github.com/padraic/mockery/blob/master/LICENSE New BSD License
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */

namespace Mockery\Generator\StringManipulation\Pass;

use Mockery\Generator\MockConfiguration;

<<<<<<< HEAD
use function strrpos;
use function substr;

class InstanceMockPass
{
    public const INSTANCE_MOCK_CODE = <<<MOCK
=======
class InstanceMockPass
{
    const INSTANCE_MOCK_CODE = <<<MOCK
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    protected \$_mockery_ignoreVerification = true;

    public function __construct()
    {
        \$this->_mockery_ignoreVerification = false;
        \$associatedRealObject = \Mockery::fetchMock(__CLASS__);

        foreach (get_object_vars(\$this) as \$attr => \$val) {
            if (\$attr !== "_mockery_ignoreVerification" && \$attr !== "_mockery_expectations") {
                \$this->\$attr = \$associatedRealObject->\$attr;
            }
        }

        \$directors = \$associatedRealObject->mockery_getExpectations();
        foreach (\$directors as \$method=>\$director) {
            // get the director method needed
            \$existingDirector = \$this->mockery_getExpectationsFor(\$method);
            if (!\$existingDirector) {
                \$existingDirector = new \Mockery\ExpectationDirector(\$method, \$this);
                \$this->mockery_setExpectationsFor(\$method, \$existingDirector);
            }
            \$expectations = \$director->getExpectations();
            foreach (\$expectations as \$expectation) {
                \$clonedExpectation = clone \$expectation;
                \$existingDirector->addExpectation(\$clonedExpectation);
            }
            \$defaultExpectations = \$director->getDefaultExpectations();
            foreach (array_reverse(\$defaultExpectations) as \$expectation) {
                \$clonedExpectation = clone \$expectation;
                \$existingDirector->addExpectation(\$clonedExpectation);
                \$existingDirector->makeExpectationDefault(\$clonedExpectation);
            }
        }
        \Mockery::getContainer()->rememberMock(\$this);
<<<<<<< HEAD

=======
        
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        \$this->_mockery_constructorCalled(func_get_args());
    }
MOCK;

    public function apply($code, MockConfiguration $config)
    {
        if ($config->isInstanceMock()) {
<<<<<<< HEAD
            return $this->appendToClass($code, static::INSTANCE_MOCK_CODE);
=======
            $code = $this->appendToClass($code, static::INSTANCE_MOCK_CODE);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        return $code;
    }

    protected function appendToClass($class, $code)
    {
<<<<<<< HEAD
        $lastBrace = strrpos($class, '}');
        return substr($class, 0, $lastBrace) . $code . "\n    }\n";
=======
        $lastBrace = strrpos($class, "}");
        $class = substr($class, 0, $lastBrace) . $code . "\n    }\n";
        return $class;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
