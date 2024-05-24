<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Proxy;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Session\Storage\Handler\StrictSessionHandler;

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
/**
 * @author Drak <drak@zikula.org>
 */
class SessionHandlerProxy extends AbstractProxy implements \SessionHandlerInterface, \SessionUpdateTimestampHandlerInterface
{
    protected $handler;

    public function __construct(\SessionHandlerInterface $handler)
    {
        $this->handler = $handler;
<<<<<<< HEAD
        $this->wrapper = $handler instanceof \SessionHandler;
        $this->saveHandlerName = $this->wrapper || ($handler instanceof StrictSessionHandler && $handler->isWrapper()) ? \ini_get('session.save_handler') : 'user';
=======
        $this->wrapper = ($handler instanceof \SessionHandler);
        $this->saveHandlerName = $this->wrapper ? ini_get('session.save_handler') : 'user';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return \SessionHandlerInterface
     */
    public function getHandler()
    {
        return $this->handler;
    }

    // \SessionHandlerInterface

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function open($savePath, $sessionName)
    {
        return $this->handler->open($savePath, $sessionName);
=======
    public function open($savePath, $sessionName)
    {
        return (bool) $this->handler->open($savePath, $sessionName);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function close()
    {
        return $this->handler->close();
    }

    /**
     * @return string|false
     */
    #[\ReturnTypeWillChange]
    public function read($sessionId)
    {
        return $this->handler->read($sessionId);
=======
    public function close()
    {
        return (bool) $this->handler->close();
    }

    /**
     * @return string
     */
    public function read($sessionId)
    {
        return (string) $this->handler->read($sessionId);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function write($sessionId, $data)
    {
        return $this->handler->write($sessionId, $data);
=======
    public function write($sessionId, $data)
    {
        return (bool) $this->handler->write($sessionId, $data);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
    public function destroy($sessionId)
    {
        return $this->handler->destroy($sessionId);
    }

    /**
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        return $this->handler->gc($maxlifetime);
=======
    public function destroy($sessionId)
    {
        return (bool) $this->handler->destroy($sessionId);
    }

    /**
     * @return bool
     */
    public function gc($maxlifetime)
    {
        return (bool) $this->handler->gc($maxlifetime);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function validateId($sessionId)
    {
        return !$this->handler instanceof \SessionUpdateTimestampHandlerInterface || $this->handler->validateId($sessionId);
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function updateTimestamp($sessionId, $data)
    {
        return $this->handler instanceof \SessionUpdateTimestampHandlerInterface ? $this->handler->updateTimestamp($sessionId, $data) : $this->write($sessionId, $data);
    }
}
