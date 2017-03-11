<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request\Adapter;

/**
 * Interface DataStoreAdapter
 *
 * @author jrdn rc <jordan@jcrocker.uk>
 */
interface DataStoreAdapter
{
    /**
     * @param array $data
     * @return void
     */
    public function store(array $data);
}