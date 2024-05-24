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
 * Base Handler class providing the Handler structure, including processors and formatters
 *
 * Classes extending it should (in most cases) only implement write($record)
 *
 * @author Jordi Boggiano <j.boggiano@seld.be>
 * @author Christophe Coevoet <stof@notk.org>
<<<<<<< HEAD
 *
 * @phpstan-import-type LevelName from \Monolog\Logger
 * @phpstan-import-type Level from \Monolog\Logger
 * @phpstan-import-type Record from \Monolog\Logger
 * @phpstan-type FormattedRecord array{message: string, context: mixed[], level: Level, level_name: LevelName, channel: string, datetime: \DateTimeImmutable, extra: mixed[], formatted: mixed}
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 */
abstract class AbstractProcessingHandler extends AbstractHandler implements ProcessableHandlerInterface, FormattableHandlerInterface
{
    use ProcessableHandlerTrait;
    use FormattableHandlerTrait;

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function handle(array $record): bool
    {
        if (!$this->isHandling($record)) {
            return false;
        }

        if ($this->processors) {
<<<<<<< HEAD
            /** @var Record $record */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $record = $this->processRecord($record);
        }

        $record['formatted'] = $this->getFormatter()->format($record);

        $this->write($record);

        return false === $this->bubble;
    }

    /**
     * Writes the record down to the log of the implementing handler
<<<<<<< HEAD
     *
     * @phpstan-param FormattedRecord $record
     */
    abstract protected function write(array $record): void;

    /**
     * @return void
     */
=======
     */
    abstract protected function write(array $record): void;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function reset()
    {
        parent::reset();

        $this->resetProcessors();
    }
}
