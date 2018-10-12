<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Job;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Routing\Router;
use SmoothPhp\RequestLogger\Request\Store;

/**
 * Class LogRequests
 *
 * @author jrdn rc <jordan@jcrocker.uk>
 */
final class LogRequests implements ShouldQueue
{
    use InteractsWithQueue, Queueable;

    /**
     * @param Router $router
     * @param Store  $store
     * @return void
     */
    public function handle(Router $router, Store $store) : void
    {
        $route   = $router->getCurrentRoute();
        $request = $router->getCurrentRequest();

        $data = [
            'url'     => $request->url(),
            'method'  => $request->method(),
            'headers' => $request->headers->all(),
            'query'   => $request->query->all(),
            'body'    => $request->request->all(),
            'route'   => [
                'parameters' => $route->parameters()
            ]
        ];

        $store->log($request->ip(), $data);

        $this->delete();
    }
}
