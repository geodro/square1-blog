<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Cache;

class CacheResponse
{
    public function handle(Request $request, Closure $next)
    {
        if (Cache::has($request->getRequestUri())) {
            return response(Cache::get($request->getRequestUri()));
        }

        return $next($request);
    }

    public function terminate(Request $request, Response $response): void
    {
        if ($this->shouldCache($request, $response)) {
            Cache::remember($request->getRequestUri(), 86400, function () use ($response) {
                return $response->getContent();
            });
        }
    }

    public function shouldCache(Request $request, Response $response): bool
    {
        return $request->isMethod('GET') && $response->getStatusCode() == 200;
    }
}
