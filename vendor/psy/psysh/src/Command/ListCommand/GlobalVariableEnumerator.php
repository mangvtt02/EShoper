<?php

/*
 * This file is part of Psy Shell.
 *
<<<<<<< HEAD
 * (c) 2012-2023 Justin Hileman
=======
 * (c) 2012-2020 Justin Hileman
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Psy\Command\ListCommand;

use Symfony\Component\Console\Input\InputInterface;

/**
 * Global Variable Enumerator class.
 */
class GlobalVariableEnumerator extends Enumerator
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function listItems(InputInterface $input, ?\Reflector $reflector = null, $target = null): array
=======
    protected function listItems(InputInterface $input, \Reflector $reflector = null, $target = null)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // only list globals when no Reflector is present.
        if ($reflector !== null || $target !== null) {
            return [];
        }

        // only list globals if we are specifically asked
        if (!$input->getOption('globals')) {
            return [];
        }

        $globals = $this->prepareGlobals($this->getGlobals());

        if (empty($globals)) {
            return [];
        }

        return [
            'Global Variables' => $globals,
        ];
    }

    /**
     * Get defined global variables.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function getGlobals(): array
=======
    protected function getGlobals()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        global $GLOBALS;

        $names = \array_keys($GLOBALS);
        \natcasesort($names);

        $ret = [];
        foreach ($names as $name) {
            $ret[$name] = $GLOBALS[$name];
        }

        return $ret;
    }

    /**
     * Prepare formatted global variable array.
     *
     * @param array $globals
     *
     * @return array
     */
<<<<<<< HEAD
    protected function prepareGlobals(array $globals): array
=======
    protected function prepareGlobals($globals)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        // My kingdom for a generator.
        $ret = [];

        foreach ($globals as $name => $value) {
            if ($this->showItem($name)) {
<<<<<<< HEAD
                $fname = '$'.$name;
=======
                $fname = '$' . $name;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                $ret[$fname] = [
                    'name'  => $fname,
                    'style' => self::IS_GLOBAL,
                    'value' => $this->presentRef($value),
                ];
            }
        }

        return $ret;
    }
}
