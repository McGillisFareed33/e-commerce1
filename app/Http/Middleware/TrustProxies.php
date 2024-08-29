<?php

namespace App\Http\Middleware;

use Illuminate\Http\Middleware\TrustProxies as Middleware;
use Illuminate\Contracts\Config\Repository as Config;
use Symfony\Component\HttpFoundation\Request;

class TrustProxies extends Middleware
{
    /**
     * The trusted proxies for this application.
     *
     * @var array|string|null
     */
    protected $proxies;

    /**
     * The current proxy header mappings.
     *
     * @var int
     */
    protected $headers;

    /**
     * Create a new middleware instance.
     *
     * @param  \Illuminate\Contracts\Config\Repository  $config
     * @return void
     */
    public function __construct(Config $config)
    {
        $this->proxies = $config->get('trustedproxy.proxies');

        $this->headers = $config->get('trustedproxy.headers', Request::HEADER_X_FORWARDED_ALL);
    }
}
