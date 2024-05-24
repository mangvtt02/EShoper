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

<<<<<<< HEAD
use Mockery\Generator\Method;
use Mockery\Generator\MockConfiguration;
use Mockery\Generator\Parameter;
use Mockery\Generator\TargetClassInterface;

use function array_filter;
use function array_merge;
use function end;
use function in_array;
use function is_array;
use function preg_match;
use function preg_match_all;
use function preg_replace;
use function rtrim;
use function sprintf;
=======
use Mockery\Generator\MockConfiguration;
use Mockery\Generator\TargetClassInterface;
use Mockery\Generator\Method;
use Mockery\Generator\Parameter;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

class MagicMethodTypeHintsPass implements Pass
{
    /**
<<<<<<< HEAD
     * @var array
     */
    private $mockMagicMethods = [
=======
     * @var array $mockMagicMethods
     */
    private $mockMagicMethods = array(
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        '__construct',
        '__destruct',
        '__call',
        '__callStatic',
        '__get',
        '__set',
        '__isset',
        '__unset',
        '__sleep',
        '__wakeup',
        '__toString',
        '__invoke',
        '__set_state',
        '__clone',
<<<<<<< HEAD
        '__debugInfo',
    ];
=======
        '__debugInfo'
    );
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Apply implementation.
     *
     * @param string $code
     * @param MockConfiguration $config
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    public function apply($code, MockConfiguration $config)
    {
        $magicMethods = $this->getMagicMethods($config->getTargetClass());
        foreach ($config->getTargetInterfaces() as $interface) {
            $magicMethods = array_merge($magicMethods, $this->getMagicMethods($interface));
        }

        foreach ($magicMethods as $method) {
            $code = $this->applyMagicTypeHints($code, $method);
        }

        return $code;
    }

    /**
     * Returns the magic methods within the
     * passed DefinedTargetClass.
     *
     * @param TargetClassInterface $class
<<<<<<< HEAD
     *
     * @return array
     */
    public function getMagicMethods(?TargetClassInterface $class = null)
    {
        if (! $class instanceof TargetClassInterface) {
            return [];
        }

        return array_filter($class->getMethods(), function (Method $method) {
            return in_array($method->getName(), $this->mockMagicMethods, true);
        });
    }

    protected function renderTypeHint(Parameter $param)
    {
        $typeHint = $param->getTypeHint();

        return $typeHint === null ? '' : sprintf('%s ', $typeHint);
    }

=======
     * @return array
     */
    public function getMagicMethods(
        TargetClassInterface $class = null
    ) {
        if (is_null($class)) {
            return array();
        }
        return array_filter($class->getMethods(), function (Method $method) {
            return in_array($method->getName(), $this->mockMagicMethods);
        });
    }

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    /**
     * Applies type hints of magic methods from
     * class to the passed code.
     *
     * @param int $code
     * @param Method $method
<<<<<<< HEAD
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @return string
     */
    private function applyMagicTypeHints($code, Method $method)
    {
        if ($this->isMethodWithinCode($code, $method)) {
<<<<<<< HEAD
            $namedParameters = $this->getOriginalParameters($code, $method);
=======
            $namedParameters = $this->getOriginalParameters(
                $code,
                $method
            );
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $code = preg_replace(
                $this->getDeclarationRegex($method->getName()),
                $this->getMethodDeclaration($method, $namedParameters),
                $code
            );
        }
<<<<<<< HEAD

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return $code;
    }

    /**
<<<<<<< HEAD
     * Returns a regex string used to match the
     * declaration of some method.
     *
     * @param string $methodName
     *
     * @return string
     */
    private function getDeclarationRegex($methodName)
    {
        return sprintf('/public\s+(?:static\s+)?function\s+%s\s*\(.*\)\s*(?=\{)/i', $methodName);
=======
     * Checks if the method is declared within code.
     *
     * @param int $code
     * @param Method $method
     * @return boolean
     */
    private function isMethodWithinCode($code, Method $method)
    {
        return preg_match(
            $this->getDeclarationRegex($method->getName()),
            $code
        ) == 1;
    }

    /**
     * Returns the method original parameters, as they're
     * described in the $code string.
     *
     * @param int $code
     * @param Method $method
     * @return array
     */
    private function getOriginalParameters($code, Method $method)
    {
        $matches = [];
        $parameterMatches = [];

        preg_match(
            $this->getDeclarationRegex($method->getName()),
            $code,
            $matches
        );

        if (count($matches) > 0) {
            preg_match_all(
                '/(?<=\$)(\w+)+/i',
                $matches[0],
                $parameterMatches
            );
        }

        $groupMatches = end($parameterMatches);
        $parameterNames = is_array($groupMatches) ? $groupMatches : [$groupMatches];

        return $parameterNames;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Gets the declaration code, as a string, for the passed method.
     *
     * @param Method $method
<<<<<<< HEAD
     * @param array $namedParameters
     *
     * @return string
     */
    private function getMethodDeclaration(Method $method, array $namedParameters)
    {
=======
     * @param array  $namedParameters
     * @return string
     */
    private function getMethodDeclaration(
        Method $method,
        array $namedParameters
    ) {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $declaration = 'public';
        $declaration .= $method->isStatic() ? ' static' : '';
        $declaration .= ' function ' . $method->getName() . '(';

        foreach ($method->getParameters() as $index => $parameter) {
            $declaration .= $this->renderTypeHint($parameter);
<<<<<<< HEAD
            $name = $namedParameters[$index] ?? $parameter->getName();
            $declaration .= '$' . $name;
            $declaration .= ',';
        }

=======
            $name = isset($namedParameters[$index]) ? $namedParameters[$index] : $parameter->getName();
            $declaration .= '$' . $name;
            $declaration .= ',';
        }
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $declaration = rtrim($declaration, ',');
        $declaration .= ') ';

        $returnType = $method->getReturnType();
        if ($returnType !== null) {
            $declaration .= sprintf(': %s', $returnType);
        }

        return $declaration;
    }

<<<<<<< HEAD
    /**
     * Returns the method original parameters, as they're
     * described in the $code string.
     *
     * @param int $code
     * @param Method $method
     *
     * @return array
     */
    private function getOriginalParameters($code, Method $method)
    {
        $matches = [];
        $parameterMatches = [];

        preg_match($this->getDeclarationRegex($method->getName()), $code, $matches);

        if ($matches !== []) {
            preg_match_all('/(?<=\$)(\w+)+/i', $matches[0], $parameterMatches);
        }

        $groupMatches = end($parameterMatches);

        return is_array($groupMatches) ? $groupMatches : [$groupMatches];
    }

    /**
     * Checks if the method is declared within code.
     *
     * @param int $code
     * @param Method $method
     *
     * @return boolean
     */
    private function isMethodWithinCode($code, Method $method)
    {
        return preg_match($this->getDeclarationRegex($method->getName()), $code) === 1;
=======
    protected function renderTypeHint(Parameter $param)
    {
        $typeHint = $param->getTypeHint();

        return $typeHint === null ? '' : sprintf('%s ', $typeHint);
    }

    /**
     * Returns a regex string used to match the
     * declaration of some method.
     *
     * @param string $methodName
     * @return string
     */
    private function getDeclarationRegex($methodName)
    {
        return "/public\s+(?:static\s+)?function\s+$methodName\s*\(.*\)\s*(?=\{)/i";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
