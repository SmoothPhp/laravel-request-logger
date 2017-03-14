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
     * @param string $ip
     * @param array $data
     * @return void
     */
    public function log(string $ip, array $data);
}