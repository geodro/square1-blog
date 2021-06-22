<?php

namespace App\Services;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;

class BlogClient
{
    protected $endpoint;

    public function __construct(string $endpoint = null)
    {
        $this->endpoint = $endpoint ?? env('BLOG_API', '');
    }

    public function getPath(string $uri = ''): string
    {
        return $this->endpoint . '/' . $uri;
    }

    public function getPosts(): Response
    {
        return Http::get($this->getPath('posts'));
    }
}
