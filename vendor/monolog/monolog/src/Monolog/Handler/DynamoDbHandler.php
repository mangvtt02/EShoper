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

use Aws\Sdk;
use Aws\DynamoDb\DynamoDbClient;
use Monolog\Formatter\FormatterInterface;
use Aws\DynamoDb\Marshaler;
use Monolog\Formatter\ScalarFormatter;
use Monolog\Logger;

/**
 * Amazon DynamoDB handler (http://aws.amazon.com/dynamodb/)
 *
 * @link https://github.com/aws/aws-sdk-php/
 * @author Andrew Lawson <adlawson@gmail.com>
 */
class DynamoDbHandler extends AbstractProcessingHandler
{
    public const DATE_FORMAT = 'Y-m-d\TH:i:s.uO';

    /**
     * @var DynamoDbClient
     */
    protected $client;

    /**
     * @var string
     */
    protected $table;

    /**
     * @var int
     */
    protected $version;

    /**
     * @var Marshaler
     */
    protected $marshaler;

<<<<<<< HEAD
    public function __construct(DynamoDbClient $client, string $table, $level = Logger::DEBUG, bool $bubble = true)
    {
        /** @phpstan-ignore-next-line */
=======
    /**
     * @param int|string $level
     */
    public function __construct(DynamoDbClient $client, string $table, $level = Logger::DEBUG, bool $bubble = true)
    {
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
        if (defined('Aws\Sdk::VERSION') && version_compare(Sdk::VERSION, '3.0', '>=')) {
            $this->version = 3;
            $this->marshaler = new Marshaler;
        } else {
            $this->version = 2;
        }

        $this->client = $client;
        $this->table = $table;

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
        $filtered = $this->filterEmptyFields($record['formatted']);
        if ($this->version === 3) {
            $formatted = $this->marshaler->marshalItem($filtered);
        } else {
<<<<<<< HEAD
            /** @phpstan-ignore-next-line */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
            $formatted = $this->client->formatAttributes($filtered);
        }

        $this->client->putItem([
            'TableName' => $this->table,
            'Item' => $formatted,
        ]);
    }

<<<<<<< HEAD
    /**
     * @param  mixed[] $record
     * @return mixed[]
     */
=======
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
    protected function filterEmptyFields(array $record): array
    {
        return array_filter($record, function ($value) {
            return !empty($value) || false === $value || 0 === $value;
        });
    }

    /**
<<<<<<< HEAD
     * {@inheritDoc}
=======
     * {@inheritdoc}
>>>>>>> 4fdc86299b8092f9ff65a6dbe715664179743822
     */
    protected function getDefaultFormatter(): FormatterInterface
    {
        return new ScalarFormatter(self::DATE_FORMAT);
    }
}
