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

use Monolog\ResettableInterface;
<<<<<<< HEAD
use Monolog\Processor\ProcessorInterface;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Helper trait for implementing ProcessableInterface
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
<<<<<<< HEAD
 *
 * @phpstan-import-type Record from \Monolog\Logger
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
trait ProcessableHandlerTrait
{
    /**
     * @var callable[]
<<<<<<< HEAD
     * @phpstan-var array<ProcessorInterface|callable(Record): Record>
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $processors = [];

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
     * @suppress PhanTypeMismatchReturn
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function pushProcessor(callable $callback): HandlerInterface
    {
        array_unshift($this->processors, $callback);

        return $this;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function popProcessor(): callable
    {
        if (!$this->processors) {
            throw new \LogicException('You tried to pop from an empty processor stack.');
        }

        return array_shift($this->processors);
    }

    /**
     * Processes a record.
<<<<<<< HEAD
     *
     * @phpstan-param  Record $record
     * @phpstan-return Record
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function processRecord(array $record): array
    {
        foreach ($this->processors as $processor) {
            $record = $processor($record);
        }

        return $record;
    }

    protected function resetProcessors(): void
    {
        foreach ($this->processors as $processor) {
            if ($processor instanceof ResettableInterface) {
                $processor->reset();
            }
        }
    }
}
