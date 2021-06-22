<?php

namespace Tests\Unit;

use App\Models\Post;
use App\Services\BlogClient;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class BlogClientTest extends TestCase
{
    public function test_getPath()
    {
        $client = new BlogClient();
        $this->assertIsString($client->getPath());
    }

    public function test_getPosts()
    {
        $postArray = Post::factory()->make()->toArray();

        Http::fake([
            '*' => Http::response([
                'data' => [
                    $postArray
                ]
            ]),
        ]);

        $client = new BlogClient();

        Http::get($client->getPath('posts'));

        $this->assertEquals(200, $client->getPosts()->status());
    }
}
