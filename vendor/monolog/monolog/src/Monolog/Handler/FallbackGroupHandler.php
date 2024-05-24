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

use Throwable;

<<<<<<< HEAD
/**
 * Forwards records to at most one handler
 *
 * If a handler fails, the exception is suppressed and the record is forwarded to the next handler.
 *
 * As soon as one handler handles a record successfully, the handling stops there.
 *
 * @phpstan-import-type Record from \Monolog\Logger
 */
class FallbackGroupHandler extends GroupHandler
{
    /**
     * {@inheritDoc}
=======
class FallbackGroupHandler extends GroupHandler
{
    /**
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handle(array $record): bool
    {
        if ($this->processors) {
<<<<<<< HEAD
            /** @var Record $record */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $record = $this->processRecord($record);
        }
        foreach ($this->handlers as $handler) {
            try {
                $handler->handle($record);
                break;
            } catch (Throwable $e) {
                // What throwable?
            }
        }

        return false === $this->bubble;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handleBatch(array $records): void
    {
        if ($this->processors) {
            $processed = [];
            foreach ($records as $record) {
                $processed[] = $this->processRecord($record);
            }
<<<<<<< HEAD
            /** @var Record[] $records */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $records = $processed;
        }

        foreach ($this->handlers as $handler) {
            try {
                $handler->handleBatch($records);
                break;
            } catch (Throwable $e) {
                // What throwable?
            }
        }
    }
}
