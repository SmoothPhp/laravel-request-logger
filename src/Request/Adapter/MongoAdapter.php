<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request\Adapter;

use Jenssegers\Mongodb\Connection;

/**
 * Class MongoAdapter
 * @package SmoothPhp\RequestLogger\Request\Adapter
 * @author jrdn rc <jordan@jcrocker.uk>
 */
final class MongoAdapter implements DataStoreAdapter
{
    /** @var Connection */
    private $connection;
    /** @var string */
    private $collection;

    /**
     * @param Connection $connection
     * @param string $collection
     */
    public function __construct(Connection $connection, string $collection)
    {
        $this->connection = $connection;
        $this->collection = $collection;
    }

    /**
     * @param string $ip
     * @param array $data
     * @return void
     */
    public function store(string $ip, array $data)
    {
        $data['ip'] = $ip;
        $this->connection->collection($this->collection)->insert([$data]);
    }
}