<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request;

/**
 * Interface Store
 *
 * @author jrdn rc <jordan@jcrocker.uk>
 */
interface Store
{
    /**
     * @param array $data
     * @return void
     */
    public function log(array $data);
}