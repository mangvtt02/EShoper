<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
 * Memcached based session storage handler based on the Memcached class
 * provided by the PHP memcached extension.
 *
 * @see https://php.net/memcached
 *
 * @author Drak <drak@zikula.org>
 */
class MemcachedSessionHandler extends AbstractSessionHandler
{
    private $memcached;

    /**
     * @var int Time to live in seconds
     */
    private $ttl;

    /**
     * @var string Key prefix for shared environments
     */
    private $prefix;

    /**
     * Constructor.
     *
     * List of available options:
     *  * prefix: The prefix to use for the memcached keys in order to avoid collision
     *  * expiretime: The time to live in seconds.
     *
     * @throws \InvalidArgumentException When unsupported options are passed
     */
    public function __construct(\Memcached $memcached, array $options = [])
    {
        $this->memcached = $memcached;

        if ($diff = array_diff(array_keys($options), ['prefix', 'expiretime'])) {
            throw new \InvalidArgumentException(sprintf('The following options are not supported "%s".', implode(', ', $diff)));
        }

        $this->ttl = isset($options['expiretime']) ? (int) $options['expiretime'] : 86400;
<<<<<<< HEAD
        $this->prefix = $options['prefix'] ?? 'sf2s';
=======
        $this->prefix = isset($options['prefix']) ? $options['prefix'] : 'sf2s';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * @return bool
     */
<<<<<<< HEAD
    #[\ReturnTypeWillChange]
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function close()
    {
        return $this->memcached->quit();
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead($sessionId)
    {
        return $this->memcached->get($this->prefix.$sessionId) ?: '';
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
        $this->memcached->touch($this->prefix.$sessionId, time() + $this->ttl);

        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doWrite($sessionId, $data)
    {
        return $this->memcached->set($this->prefix.$sessionId, $data, time() + $this->ttl);
    }

    /**
     * {@inheritdoc}
     */
    protected function doDestroy($sessionId)
    {
        $result = $this->memcached->delete($this->prefix.$sessionId);

        return $result || \Memcached::RES_NOTFOUND == $this->memcached->getResultCode();
    }

    /**
<<<<<<< HEAD
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        // not required here because memcached will auto expire the records anyhow.
        return 0;
=======
     * @return bool
     */
    public function gc($maxlifetime)
    {
        // not required here because memcached will auto expire the records anyhow.
        return true;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Return a Memcached instance.
     *
     * @return \Memcached
     */
    protected function getMemcached()
    {
        return $this->memcached;
    }
}
