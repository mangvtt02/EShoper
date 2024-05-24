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

<<<<<<< HEAD
use Elastica\Document;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\ElasticaFormatter;
use Monolog\Logger;
use Elastica\Client;
use Elastica\Exception\ExceptionInterface;

/**
 * Elastic Search handler
 *
 * Usage example:
 *
 *    $client = new \Elastica\Client();
 *    $options = array(
 *        'index' => 'elastic_index_name',
<<<<<<< HEAD
 *        'type' => 'elastic_doc_type', Types have been removed in Elastica 7
=======
 *        'type' => 'elastic_doc_type',
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
 *    );
 *    $handler = new ElasticaHandler($client, $options);
 *    $log = new Logger('application');
 *    $log->pushHandler($handler);
 *
 * @author Jelle Vink <jelle.vink@gmail.com>
 */
class ElasticaHandler extends AbstractProcessingHandler
{
    /**
     * @var Client
     */
    protected $client;

    /**
<<<<<<< HEAD
     * @var mixed[] Handler config options
=======
     * @var array Handler config options
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected $options = [];

    /**
<<<<<<< HEAD
     * @param Client  $client  Elastica Client object
     * @param mixed[] $options Handler configuration
=======
     * @param Client     $client  Elastica Client object
     * @param array      $options Handler configuration
     * @param int|string $level   The minimum logging level at which this handler will be triggered
     * @param bool       $bubble  Whether the messages that are handled can bubble up the stack or not
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function __construct(Client $client, array $options = [], $level = Logger::DEBUG, bool $bubble = true)
    {
        parent::__construct($level, $bubble);
        $this->client = $client;
        $this->options = array_merge(
            [
                'index'          => 'monolog',      // Elastic index name
                'type'           => 'record',       // Elastic document type
                'ignore_error'   => false,          // Suppress Elastica exceptions
            ],
            $options
        );
    }

    /**
     * {@inheritDoc}
     */
    protected function write(array $record): void
    {
        $this->bulkSend([$record['formatted']]);
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function setFormatter(FormatterInterface $formatter): HandlerInterface
    {
        if ($formatter instanceof ElasticaFormatter) {
            return parent::setFormatter($formatter);
        }

        throw new \InvalidArgumentException('ElasticaHandler is only compatible with ElasticaFormatter');
    }

<<<<<<< HEAD
    /**
     * @return mixed[]
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new ElasticaFormatter($this->options['index'], $this->options['type']);
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
        $documents = $this->getFormatter()->formatBatch($records);
        $this->bulkSend($documents);
    }

    /**
     * Use Elasticsearch bulk API to send list of documents
<<<<<<< HEAD
     *
     * @param Document[] $documents
     *
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws \RuntimeException
     */
    protected function bulkSend(array $documents): void
    {
        try {
            $this->client->addDocuments($documents);
        } catch (ExceptionInterface $e) {
            if (!$this->options['ignore_error']) {
                throw new \RuntimeException("Error sending messages to Elasticsearch", 0, $e);
            }
        }
    }
}
