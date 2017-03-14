<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request\Adapter;

use Jenssegers\Mongodb\Connection;

/**
 * Class MongoAdapter
 * @package SmoothPhp\RequestLogger\Request\Adapter
 * @author jrdn hannah <jordan@hotsnapper.com>
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
     * @param array $data
     * @return void
     */
    public function store(array $data)
    {
        $this->connection->collection($this->collection)->insert([$data]);
    }
}