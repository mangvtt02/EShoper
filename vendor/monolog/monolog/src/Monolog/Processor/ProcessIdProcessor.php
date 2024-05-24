<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Processor;

/**
 * Adds value of getmypid into records
 *
 * @author Andreas Hörnicke
 */
class ProcessIdProcessor implements ProcessorInterface
{
<<<<<<< HEAD
    /**
     * {@inheritDoc}
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function __invoke(array $record): array
    {
        $record['extra']['process_id'] = getmypid();

        return $record;
    }
}
