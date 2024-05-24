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

/**
 * Forwards records to multiple handlers suppressing failures of each handler
 * and continuing through to give every handler a chance to succeed.
 *
 * @author Craig D'Amelio <craig@damelio.ca>
<<<<<<< HEAD
 *
 * @phpstan-import-type Record from \Monolog\Logger
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
class WhatFailureGroupHandler extends GroupHandler
{
    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
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
            } catch (\Throwable $e) {
                // What failure?
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
            $processed = array();
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
            } catch (\Throwable $e) {
                // What failure?
            }
        }
    }
<<<<<<< HEAD

    /**
     * {@inheritDoc}
     */
    public function close(): void
    {
        foreach ($this->handlers as $handler) {
            try {
                $handler->close();
            } catch (\Throwable $e) {
                // What failure?
            }
        }
    }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
}
