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
use Elastic\Elasticsearch\Response\Elasticsearch;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
use Throwable;
use RuntimeException;
use Monolog\Logger;
use Monolog\Formatter\FormatterInterface;
use Monolog\Formatter\ElasticsearchFormatter;
use InvalidArgumentException;
use Elasticsearch\Common\Exceptions\RuntimeException as ElasticsearchRuntimeException;
use Elasticsearch\Client;
<<<<<<< HEAD
use Elastic\Elasticsearch\Exception\InvalidArgumentException as ElasticInvalidArgumentException;
use Elastic\Elasticsearch\Client as Client8;
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822

/**
 * Elasticsearch handler
 *
 * @link https://www.elastic.co/guide/en/elasticsearch/client/php-api/current/index.html
 *
 * Simple usage example:
 *
 *    $client = \Elasticsearch\ClientBuilder::create()
 *        ->setHosts($hosts)
 *        ->build();
 *
 *    $options = array(
 *        'index' => 'elastic_index_name',
 *        'type'  => 'elastic_doc_type',
 *    );
 *    $handler = new ElasticsearchHandler($client, $options);
 *    $log = new Logger('application');
 *    $log->pushHandler($handler);
 *
 * @author Avtandil Kikabidze <akalongman@gmail.com>
 */
class ElasticsearchHandler extends AbstractProcessingHandler
{
    /**
<<<<<<< HEAD
     * @var Client|Client8
=======
     * @var Client
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
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
     * @var bool
     */
    private $needsType;

    /**
     * @param Client|Client8 $client  Elasticsearch Client object
     * @param mixed[]        $options Handler configuration
     */
    public function __construct($client, array $options = [], $level = Logger::DEBUG, bool $bubble = true)
    {
        if (!$client instanceof Client && !$client instanceof Client8) {
            throw new \TypeError('Elasticsearch\Client or Elastic\Elasticsearch\Client instance required');
        }

=======
     * @param Client     $client  Elasticsearch Client object
     * @param array      $options Handler configuration
     * @param string|int $level   The minimum logging level at which this handler will be triggered
     * @param bool       $bubble  Whether the messages that are handled can bubble up the stack or not
     */
    public function __construct(Client $client, array $options = [], $level = Logger::DEBUG, bool $bubble = true)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        parent::__construct($level, $bubble);
        $this->client = $client;
        $this->options = array_merge(
            [
                'index'        => 'monolog', // Elastic index name
                'type'         => '_doc',    // Elastic document type
                'ignore_error' => false,     // Suppress Elasticsearch exceptions
            ],
            $options
        );
<<<<<<< HEAD

        if ($client instanceof Client8 || $client::VERSION[0] === '7') {
            $this->needsType = false;
            // force the type to _doc for ES8/ES7
            $this->options['type'] = '_doc';
        } else {
            $this->needsType = true;
        }
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
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
        if ($formatter instanceof ElasticsearchFormatter) {
            return parent::setFormatter($formatter);
        }

        throw new InvalidArgumentException('ElasticsearchHandler is only compatible with ElasticsearchFormatter');
    }

    /**
     * Getter options
     *
<<<<<<< HEAD
     * @return mixed[]
=======
     * @return array
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    public function getOptions(): array
    {
        return $this->options;
    }

    /**
     * {@inheritDoc}
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new ElasticsearchFormatter($this->options['index'], $this->options['type']);
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
     *
<<<<<<< HEAD
     * @param  array[]           $records Records + _index/_type keys
=======
     * @param  array             $records
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     * @throws \RuntimeException
     */
    protected function bulkSend(array $records): void
    {
        try {
            $params = [
                'body' => [],
            ];

            foreach ($records as $record) {
                $params['body'][] = [
<<<<<<< HEAD
                    'index' => $this->needsType ? [
                        '_index' => $record['_index'],
                        '_type'  => $record['_type'],
                    ] : [
                        '_index' => $record['_index'],
=======
                    'index' => [
                        '_index' => $record['_index'],
                        '_type'  => $record['_type'],
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
                    ],
                ];
                unset($record['_index'], $record['_type']);

                $params['body'][] = $record;
            }

<<<<<<< HEAD
            /** @var Elasticsearch */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $responses = $this->client->bulk($params);

            if ($responses['errors'] === true) {
                throw $this->createExceptionFromResponses($responses);
            }
        } catch (Throwable $e) {
            if (! $this->options['ignore_error']) {
                throw new RuntimeException('Error sending messages to Elasticsearch', 0, $e);
            }
        }
    }

    /**
     * Creates elasticsearch exception from responses array
     *
     * Only the first error is converted into an exception.
     *
<<<<<<< HEAD
     * @param mixed[]|Elasticsearch $responses returned by $this->client->bulk()
     */
    protected function createExceptionFromResponses($responses): Throwable
=======
     * @param array $responses returned by $this->client->bulk()
     */
    protected function createExceptionFromResponses(array $responses): ElasticsearchRuntimeException
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    {
        foreach ($responses['items'] ?? [] as $item) {
            if (isset($item['index']['error'])) {
                return $this->createExceptionFromError($item['index']['error']);
            }
        }

<<<<<<< HEAD
        if (class_exists(ElasticInvalidArgumentException::class)) {
            return new ElasticInvalidArgumentException('Elasticsearch failed to index one or more records.');
        }

=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new ElasticsearchRuntimeException('Elasticsearch failed to index one or more records.');
    }

    /**
     * Creates elasticsearch exception from error array
     *
<<<<<<< HEAD
     * @param mixed[] $error
     */
    protected function createExceptionFromError(array $error): Throwable
    {
        $previous = isset($error['caused_by']) ? $this->createExceptionFromError($error['caused_by']) : null;

        if (class_exists(ElasticInvalidArgumentException::class)) {
            return new ElasticInvalidArgumentException($error['type'] . ': ' . $error['reason'], 0, $previous);
        }

=======
     * @param array $error
     */
    protected function createExceptionFromError(array $error): ElasticsearchRuntimeException
    {
        $previous = isset($error['caused_by']) ? $this->createExceptionFromError($error['caused_by']) : null;

>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        return new ElasticsearchRuntimeException($error['type'] . ': ' . $error['reason'], 0, $previous);
    }
}
