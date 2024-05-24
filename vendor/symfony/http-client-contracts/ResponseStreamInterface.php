<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Contracts\HttpClient;

/**
 * Yields response chunks, returned by HttpClientInterface::stream().
 *
 * @author Nicolas Grekas <p@tchwork.com>
<<<<<<< HEAD
 *
 * @extends \Iterator<ResponseInterface, ChunkInterface>
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
interface ResponseStreamInterface extends \Iterator
{
    public function key(): ResponseInterface;

    public function current(): ChunkInterface;
}
