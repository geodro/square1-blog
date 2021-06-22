<?php

namespace Tests\Feature;

use App\Models\Post;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class ImportCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_import_command()
    {
        $this->assertEquals(0, Post::query()->count());

        $postArray = Post::factory()->make()->toArray();

        Http::fake([
            '*' => Http::response([
                'data' => [
                    $postArray
                ]
            ]),
        ]);

        $this->artisan('square1:import')
            ->expectsOutput('Imported 1 posts')
            ->assertExitCode(0);

        $this->assertEquals(1, Post::query()->count());
    }
}
