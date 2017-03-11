<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request;

/**
 * Class RequestStore
 *
 * @author jrdn rc <jordan@jcrocker.uk>
 */
final class RequestStore implements Store
{
    /** @var Adapter\DataStoreAdapter */
    private $adapter;

    /**
     * RequestStore constructor.
     *
     * @param Adapter\DataStoreAdapter $adapter
     */
    public function __construct(Adapter\DataStoreAdapter $adapter)
    {
        $this->adapter = $adapter;
    }

    /**
     * @param array $data
     * @return void
     */
    public function log(array $data)
    {
        $this->adapter->store($data);
    }
}