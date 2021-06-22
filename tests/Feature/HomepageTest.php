<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class HomepageTest extends TestCase
{
    use RefreshDatabase;

    public function test_homepage()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_post_page()
    {
        $post = Post::factory()->for(User::factory()->create())->create();

        $response = $this->get('post/' . $post->id);

        $response->assertStatus(200);
    }
}
