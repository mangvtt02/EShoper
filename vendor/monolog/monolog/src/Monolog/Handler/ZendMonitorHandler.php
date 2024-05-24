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

use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\NormalizerFormatter;
use Monolog\Logger;

/**
 * Handler sending logs to Zend Monitor
 *
 * @author  Christian Bergau <cbergau86@gmail.com>
 * @author  Jason Davis <happydude@jasondavis.net>
<<<<<<< HEAD
 *
 * @phpstan-import-type FormattedRecord from AbstractProcessingHandler
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class ZendMonitorHandler extends AbstractProcessingHandler
{
    /**
     * Monolog level / ZendMonitor Custom Event priority map
     *
<<<<<<< HEAD
     * @var array<int, int>
=======
     * @var array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $levelMap = [];

    /**
<<<<<<< HEAD
=======
     * @param  string|int                $level  The minimum logging level at which this handler will be triggered.
     * @param  bool                      $bubble Whether the messages that are handled can bubble up the stack or not.
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws MissingExtensionException
     */
    public function __construct($level = Logger::DEBUG, bool $bubble = true)
    {
        if (!function_exists('zend_monitor_custom_event')) {
            throw new MissingExtensionException(
                'You must have Zend Server installed with Zend Monitor enabled in order to use this handler'
            );
        }
        //zend monitor constants are not defined if zend monitor is not enabled.
        $this->levelMap = [
            Logger::DEBUG     => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::INFO      => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::NOTICE    => \ZEND_MONITOR_EVENT_SEVERITY_INFO,
            Logger::WARNING   => \ZEND_MONITOR_EVENT_SEVERITY_WARNING,
            Logger::ERROR     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::CRITICAL  => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::ALERT     => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
            Logger::EMERGENCY => \ZEND_MONITOR_EVENT_SEVERITY_ERROR,
        ];
        parent::__construct($level, $bubble);
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
        $this->writeZendMonitorCustomEvent(
            Logger::getLevelName($record['level']),
            $record['message'],
            $record['formatted'],
            $this->levelMap[$record['level']]
        );
    }

    /**
     * Write to Zend Monitor Events
     * @param string $type      Text displayed in "Class Name (custom)" field
     * @param string $message   Text displayed in "Error String"
<<<<<<< HEAD
     * @param array  $formatted Displayed in Custom Variables tab
     * @param int    $severity  Set the event severity level (-1,0,1)
     *
     * @phpstan-param FormattedRecord $formatted
=======
     * @param mixed  $formatted Displayed in Custom Variables tab
     * @param int    $severity  Set the event severity level (-1,0,1)
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function writeZendMonitorCustomEvent(string $type, string $message, array $formatted, int $severity): void
    {
        zend_monitor_custom_event($type, $message, $formatted, $severity);
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getDefaultFormatter(): FormatterInterface
    {
        return new NormalizerFormatter();
    }

<<<<<<< HEAD
    /**
     * @return array<int, int>
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getLevelMap(): array
    {
        return $this->levelMap;
    }
}
