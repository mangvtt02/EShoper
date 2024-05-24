<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Console\Input;

use Symfony\Component\Console\Exception\InvalidArgumentException;
use Symfony\Component\Console\Exception\RuntimeException;

/**
 * InputInterface is the interface implemented by all input classes.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface InputInterface
{
    /**
     * Returns the first argument from the raw parameters (not parsed).
     *
     * @return string|null The value of the first argument or null otherwise
     */
    public function getFirstArgument();

    /**
     * Returns true if the raw parameters (not parsed) contain a value.
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
     * @param string|array $values     The values to look for in the raw parameters (can be an array)
     * @param bool         $onlyParams Only check real parameters, skip those following an end of options (--) signal
     *
     * @return bool true if the value is contained in the raw parameters
     */
    public function hasParameterOption($values, $onlyParams = false);

    /**
     * Returns the value of a raw option (not parsed).
     *
     * This method is to be used to introspect the input parameters
     * before they have been validated. It must be used carefully.
     * Does not necessarily return the correct result for short options
     * when multiple flags are combined in the same option.
     *
<<<<<<< HEAD
     * @param string|array                     $values     The value(s) to look for in the raw parameters (can be an array)
     * @param string|bool|int|float|array|null $default    The default value to return if no result is found
     * @param bool                             $onlyParams Only check real parameters, skip those following an end of options (--) signal
=======
     * @param string|array $values     The value(s) to look for in the raw parameters (can be an array)
     * @param mixed        $default    The default value to return if no result is found
     * @param bool         $onlyParams Only check real parameters, skip those following an end of options (--) signal
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return mixed The option value
     */
    public function getParameterOption($values, $default = false, $onlyParams = false);

    /**
     * Binds the current Input instance with the given arguments and options.
     *
     * @throws RuntimeException
     */
    public function bind(InputDefinition $definition);

    /**
     * Validates the input.
     *
     * @throws RuntimeException When not enough arguments are given
     */
    public function validate();

    /**
     * Returns all the given arguments merged with the default values.
     *
<<<<<<< HEAD
     * @return array<string|bool|int|float|array|null>
=======
     * @return array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getArguments();

    /**
     * Returns the argument value for a given argument name.
     *
     * @param string $name The argument name
     *
<<<<<<< HEAD
     * @return mixed
=======
     * @return string|string[]|null The argument value
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function getArgument($name);

    /**
     * Sets an argument value by name.
     *
<<<<<<< HEAD
     * @param string $name  The argument name
     * @param mixed  $value The argument value
=======
     * @param string               $name  The argument name
     * @param string|string[]|null $value The argument value
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws InvalidArgumentException When argument given doesn't exist
     */
    public function setArgument($name, $value);

    /**
     * Returns true if an InputArgument object exists by name or position.
     *
<<<<<<< HEAD
     * @param string $name The argument name
=======
     * @param string|int $name The InputArgument name or position
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @return bool true if the InputArgument object exists, false otherwise
     */
    public function hasArgument($name);

    /**
     * Returns all the given options merged with the default values.
     *
<<<<<<< HEAD
     * @return array<string|bool|int|float|array|null>
=======
     * @return array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getOptions();

    /**
     * Returns the option value for a given option name.
     *
     * @param string $name The option name
     *
<<<<<<< HEAD
     * @return mixed
=======
     * @return string|string[]|bool|null The option value
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function getOption($name);

    /**
     * Sets an option value by name.
     *
<<<<<<< HEAD
     * @param string $name  The option name
     * @param mixed  $value The option value
=======
     * @param string                    $name  The option name
     * @param string|string[]|bool|null $value The option value
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     *
     * @throws InvalidArgumentException When option given doesn't exist
     */
    public function setOption($name, $value);

    /**
     * Returns true if an InputOption object exists by name.
     *
     * @param string $name The InputOption name
     *
     * @return bool true if the InputOption object exists, false otherwise
     */
    public function hasOption($name);

    /**
     * Is this input means interactive?
     *
     * @return bool
     */
    public function isInteractive();

    /**
     * Sets the input interactivity.
     *
     * @param bool $interactive If the input should be interactive
     */
    public function setInteractive($interactive);
}
