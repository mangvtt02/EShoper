<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Handler;

use Monolog\Logger;

/**
 * @author Robert Kaufmann III <rok3@rok3.me>
 */
class LogEntriesHandler extends SocketHandler
{
    /**
     * @var string
     */
    protected $logToken;

    /**
     * @param string     $token  Log token supplied by LogEntries
     * @param bool       $useSSL Whether or not SSL encryption should be used.
<<<<<<< HEAD
=======
     * @param string|int $level  The minimum logging level to trigger this handler
     * @param bool       $bubble Whether or not messages that are handled should bubble up the stack.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param string     $host   Custom hostname to send the data to if needed
     *
     * @throws MissingExtensionException If SSL encryption is set to true and OpenSSL is missing
     */
<<<<<<< HEAD
    public function __construct(
        string $token,
        bool $useSSL = true,
        $level = Logger::DEBUG,
        bool $bubble = true,
        string $host = 'data.logentries.com',
        bool $persistent = false,
        float $timeout = 0.0,
        float $writingTimeout = 10.0,
        ?float $connectionTimeout = null,
        ?int $chunkSize = null
    ) {
=======
    public function __construct(string $token, bool $useSSL = true, $level = Logger::DEBUG, bool $bubble = true, string $host = 'data.logentries.com')
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if ($useSSL && !extension_loaded('openssl')) {
            throw new MissingExtensionException('The OpenSSL PHP plugin is required to use SSL encrypted connection for LogEntriesHandler');
        }

        $endpoint = $useSSL ? 'ssl://' . $host . ':443' : $host . ':80';
<<<<<<< HEAD
        parent::__construct(
            $endpoint,
            $level,
            $bubble,
            $persistent,
            $timeout,
            $writingTimeout,
            $connectionTimeout,
            $chunkSize
        );
=======
        parent::__construct($endpoint, $level, $bubble);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        $this->logToken = $token;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function generateDataStream(array $record): string
    {
        return $this->logToken . ' ' . $record['formatted'];
    }
}
