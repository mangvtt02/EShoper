<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\Service\ResetInterface;

/**
 * DataCollectorInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface DataCollectorInterface extends ResetInterface
{
    /**
     * Collects data for the given Request and Response.
     *
     * @param \Throwable|null $exception
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response/* , \Throwable $exception = null */);
=======
    public function collect(Request $request, Response $response/*, \Throwable $exception = null*/);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

    /**
     * Returns the name of the collector.
     *
     * @return string The collector name
     */
    public function getName();
}
