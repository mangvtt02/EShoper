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
<<<<<<< HEAD
use Monolog\Utils;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Logs to syslog service.
 *
 * usage example:
 *
 *   $log = new Logger('application');
 *   $syslog = new SyslogHandler('myfacility', 'local6');
 *   $formatter = new LineFormatter("%channel%.%level_name%: %message% %extra%");
 *   $syslog->setFormatter($formatter);
 *   $log->pushHandler($syslog);
 *
 * @author Sven Paulus <sven@karlsruhe.org>
 */
class SyslogHandler extends AbstractSyslogHandler
{
<<<<<<< HEAD
    /** @var string */
    protected $ident;
    /** @var int */
=======
    protected $ident;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    protected $logopts;

    /**
     * @param string     $ident
     * @param string|int $facility Either one of the names of the keys in $this->facilities, or a LOG_* facility constant
<<<<<<< HEAD
=======
     * @param string|int $level    The minimum logging level at which this handler will be triggered
     * @param bool       $bubble   Whether the messages that are handled can bubble up the stack or not
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @param int        $logopts  Option flags for the openlog() call, defaults to LOG_PID
     */
    public function __construct(string $ident, $facility = LOG_USER, $level = Logger::DEBUG, bool $bubble = true, int $logopts = LOG_PID)
    {
        parent::__construct($facility, $level, $bubble);

        $this->ident = $ident;
        $this->logopts = $logopts;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function close(): void
    {
        closelog();
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function write(array $record): void
    {
        if (!openlog($this->ident, $this->logopts, $this->facility)) {
<<<<<<< HEAD
            throw new \LogicException('Can\'t open syslog for ident "'.$this->ident.'" and facility "'.$this->facility.'"' . Utils::getRecordMessageForException($record));
=======
            throw new \LogicException('Can\'t open syslog for ident "'.$this->ident.'" and facility "'.$this->facility.'"');
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }
        syslog($this->logLevels[$record['level']], (string) $record['formatted']);
    }
}
