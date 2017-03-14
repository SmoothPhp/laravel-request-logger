<?php declare(strict_types=1);

namespace SmoothPhp\RequestLogger;

use Illuminate\Support\ServiceProvider;
use SmoothPhp\RequestLogger\Request\Adapter\DataStoreAdapter;
use SmoothPhp\RequestLogger\Request\Adapter\MongoAdapter;
use SmoothPhp\RequestLogger\Request\RequestStore;
use SmoothPhp\RequestLogger\Request\Store;

/**
 * Class RequestLoggerServiceProvider
 * @package SmoothPhp\RequestLogger
 * @author jrdn hannah <jordan@hotsnapper.com>
 */
final class RequestLoggerServiceProvider extends ServiceProvider
{
    /** @var bool */
    protected $defer = true;

    /**
     * Boot
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__ . '/../config/request_logger.php' => config_path('request_logger'),
            ]
        );
    }

    /**
     * Register
     */
    public function register()
    {
        $app = $this->app;

        if (class_exists(\MongoClient::class)) {
            $this->app->instance(
                MongoAdapter::class,
                new MongoAdapter(
                    $this->app->make('db')->connection($app['config']->get('request_logger.mongo.connection')),
                    $app['config']->get('request_logger.mongo.collection')
                ));
        }

        $this->app->bind(DataStoreAdapter::class, $app['config']->get('request_logger.enabled_adapter'));
        $this->app->bind(Store::class, RequestStore::class);
    }

    public function provides()
    {
        return [
            DataStoreAdapter::class,
            MongoAdapter::class,
            RequestStore::class,
            Store::class,
        ];
    }
}