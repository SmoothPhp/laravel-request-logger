<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger\Http\Middleware;

use Closure;
use Illuminate\Contracts\Bus\Dispatcher;
use SmoothPhp\RequestLogger\Job\LogRequests;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Class RequestLogger
 *
 * @author jrdn rc <jordan@jcrocker.uk>
 */
final class RequestLogger
{
    /** @var Dispatcher */
    private $dispatcher;

    /**
     * RequestLogger constructor.
     *
     * @param Dispatcher $dispatcher
     */
    public function __construct(Dispatcher $dispatcher)
    {
        $this->dispatcher = $dispatcher;
    }

    /**
     * @param Request $request
     * @param Closure $next
     * @return Response
     */
    public function __invoke(Request $request, Closure $next) : Response
    {
        $this->dispatcher->dispatch(new LogRequests);

        return $next($request);
    }
}