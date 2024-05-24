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

namespace Psy\TabCompletion\Matcher;

abstract class AbstractDefaultParametersMatcher extends AbstractContextAwareMatcher
{
    /**
     * @param \ReflectionParameter[] $reflectionParameters
     *
     * @return array
     */
<<<<<<< HEAD
    public function getDefaultParameterCompletion(array $reflectionParameters): array
=======
    public function getDefaultParameterCompletion(array $reflectionParameters)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        $parametersProcessed = [];

        foreach ($reflectionParameters as $parameter) {
            if (!$parameter->isDefaultValueAvailable()) {
                return [];
            }

            $defaultValue = $this->valueToShortString($parameter->getDefaultValue());

<<<<<<< HEAD
            $parametersProcessed[] = \sprintf('$%s = %s', $parameter->getName(), $defaultValue);
=======
            $parametersProcessed[] = "\${$parameter->getName()} = $defaultValue";
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (empty($parametersProcessed)) {
            return [];
        }

<<<<<<< HEAD
        return [\implode(', ', $parametersProcessed).')'];
=======
        return [\implode(', ', $parametersProcessed) . ')'];
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Takes in the default value of a parameter and turns it into a
     *  string representation that fits inline.
     * This is not 100% true to the original (newlines are inlined, for example).
     *
     * @param mixed $value
<<<<<<< HEAD
     */
    private function valueToShortString($value): string
=======
     *
     * @return string
     */
    private function valueToShortString($value)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        if (!\is_array($value)) {
            return \json_encode($value);
        }

        $chunks = [];
        $chunksSequential = [];

        $allSequential = true;

        foreach ($value as $key => $item) {
            $allSequential = $allSequential && \is_numeric($key) && $key === \count($chunksSequential);

<<<<<<< HEAD
            $keyString = $this->valueToShortString($key);
=======
            $keyString  = $this->valueToShortString($key);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $itemString = $this->valueToShortString($item);

            $chunks[] = "{$keyString} => {$itemString}";
            $chunksSequential[] = $itemString;
        }

        $chunksToImplode = $allSequential ? $chunksSequential : $chunks;

<<<<<<< HEAD
        return '['.\implode(', ', $chunksToImplode).']';
=======
        return '[' . \implode(', ', $chunksToImplode) . ']';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }
}
