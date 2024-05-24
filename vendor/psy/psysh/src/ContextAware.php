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

namespace Psy;

/**
 * ContextAware interface.
 *
 * This interface is used to pass the Shell's context into commands and such
 * which require access to the current scope variables.
 */
interface ContextAware
{
    /**
     * Set the Context reference.
     *
     * @param Context $context
     */
    public function setContext(Context $context);
}
