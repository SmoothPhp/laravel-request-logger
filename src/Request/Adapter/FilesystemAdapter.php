<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Request\Adapter;

use DateTime;
use Illuminate\Contracts\Filesystem\Filesystem;

/**
 * Class FilesystemAdapter
 * @package SmoothPhp\RequestLogger\Request\Adapter
 * @author jrdn rc <jordan@jcrocker.uk>
 */
final class FilesystemAdapter implements DataStoreAdapter
{
    /** @var Filesystem */
    private $filesystem;

    /** @var string */
    private $filenameFormat;

    /**
     * @param Filesystem $filesystem
     * @param string $filenameFormat
     */
    public function __construct(Filesystem $filesystem, string $filenameFormat)
    {
        $this->filesystem = $filesystem;
        $this->filenameFormat = $filenameFormat;
    }

    /**
     * @param string $ip
     * @param array $data
     * @return void
     */
    public function store(string $ip, array $data) : void
    {
        $this->filesystem->put(vsprintf('%s/%s.json', [
            $ip,
            (new DateTime)->format($this->filenameFormat)
        ]), json_encode($data));
    }
}
