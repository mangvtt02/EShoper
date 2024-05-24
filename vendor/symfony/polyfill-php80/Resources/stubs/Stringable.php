<?php

<<<<<<< HEAD
/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

if (\PHP_VERSION_ID < 80000) {
    interface Stringable
    {
        /**
         * @return string
         */
        public function __toString();
    }
=======
interface Stringable
{
    /**
     * @return string
     */
    public function __toString();
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
