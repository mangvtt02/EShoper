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
use Monolog\Formatter\HtmlFormatter;

/**
 * Base class for all mail handlers
 *
 * @author Gyula Sallai
<<<<<<< HEAD
 *
 * @phpstan-import-type Record from \Monolog\Logger
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
abstract class MailHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handleBatch(array $records): void
    {
        $messages = [];

        foreach ($records as $record) {
            if ($record['level'] < $this->level) {
                continue;
            }
<<<<<<< HEAD
            /** @var Record $message */
            $message = $this->processRecord($record);
            $messages[] = $message;
=======
            $messages[] = $this->processRecord($record);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        }

        if (!empty($messages)) {
            $this->send((string) $this->getFormatter()->formatBatch($messages), $messages);
        }
    }

    /**
     * Send a mail with the given content
     *
     * @param string $content formatted email body to be sent
     * @param array  $records the array of log records that formed this content
<<<<<<< HEAD
     *
     * @phpstan-param Record[] $records
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    abstract protected function send(string $content, array $records): void;

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function write(array $record): void
    {
        $this->send((string) $record['formatted'], [$record]);
    }

<<<<<<< HEAD
    /**
     * @phpstan-param non-empty-array<Record> $records
     * @phpstan-return Record
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    protected function getHighestRecord(array $records): array
    {
        $highestRecord = null;
        foreach ($records as $record) {
            if ($highestRecord === null || $highestRecord['level'] < $record['level']) {
                $highestRecord = $record;
            }
        }

        return $highestRecord;
    }

    protected function isHtmlBody(string $body): bool
    {
<<<<<<< HEAD
        return ($body[0] ?? null) === '<';
=======
        return substr($body, 0, 1) === '<';
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    }

    /**
     * Gets the default formatter.
     *
     * @return FormatterInterface
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new HtmlFormatter();
    }
}
