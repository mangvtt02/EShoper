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

use Psy\Context;
use Psy\ContextAware;

/**
 * An abstract tab completion Matcher which implements ContextAware.
 *
 * The AutoCompleter service will inject a Context instance into all
 * ContextAware Matchers.
 *
 * @author Marc Garcia <markcial@gmail.com>
 */
abstract class AbstractContextAwareMatcher extends AbstractMatcher implements ContextAware
{
    /**
     * Context instance (for ContextAware interface).
     *
     * @var Context
     */
    protected $context;

    /**
     * ContextAware interface.
     *
     * @param Context $context
     */
    public function setContext(Context $context)
    {
        $this->context = $context;
    }

    /**
     * Get a Context variable by name.
     *
     * @param string $var Variable name
     *
     * @return mixed
     */
<<<<<<< HEAD
    protected function getVariable(string $var)
=======
    protected function getVariable($var)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->get($var);
    }

    /**
     * Get all variables in the current Context.
     *
     * @return array
     */
<<<<<<< HEAD
    protected function getVariables(): array
=======
    protected function getVariables()
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        return $this->context->getAll();
    }
}
