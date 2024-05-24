<?php declare(strict_types=1);

/*
 * This file is part of the Monolog package.
 *
 * (c) Jordi Boggiano <j.boggiano@seld.be>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Monolog\Formatter;

<<<<<<< HEAD
use DateTimeInterface;
=======
use DateTime;
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Format a log message into an Elasticsearch record
 *
 * @author Avtandil Kikabidze <akalongman@gmail.com>
 */
class ElasticsearchFormatter extends NormalizerFormatter
{
    /**
     * @var string Elasticsearch index name
     */
    protected $index;

    /**
     * @var string Elasticsearch record type
     */
    protected $type;

    /**
     * @param string $index Elasticsearch index name
     * @param string $type  Elasticsearch record type
     */
    public function __construct(string $index, string $type)
    {
        // Elasticsearch requires an ISO 8601 format date with optional millisecond precision.
<<<<<<< HEAD
        parent::__construct(DateTimeInterface::ISO8601);
=======
        parent::__construct(DateTime::ISO8601);
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

        $this->index = $index;
        $this->type = $type;
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function format(array $record)
    {
        $record = parent::format($record);

        return $this->getDocument($record);
    }

    /**
     * Getter index
     *
     * @return string
     */
    public function getIndex(): string
    {
        return $this->index;
    }

    /**
     * Getter type
     *
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }

    /**
     * Convert a log message into an Elasticsearch record
     *
<<<<<<< HEAD
     * @param  mixed[] $record Log message
     * @return mixed[]
=======
     * @param  array $record Log message
     * @return array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function getDocument(array $record): array
    {
        $record['_index'] = $this->index;
        $record['_type'] = $this->type;

        return $record;
    }
}
