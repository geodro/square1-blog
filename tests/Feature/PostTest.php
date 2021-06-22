<?php

namespace Tests\Feature;

use App\Models\Post;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Tests\TestCase;

class PostTest extends TestCase
{
    public function test_create_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/admin/post/create');

        $response->assertStatus(200);
    }

    public function test_create_unauthenticated()
    {
        $response = $this->get('/admin/post/create');

        $response->assertStatus(302);
    }

    public function test_save_authenticated()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/post/save', Post::factory()->make()->toArray());

        $response->assertSessionHasNoErrors();
        $response->assertRedirect('/admin');
    }

    public function test_save_authenticated_invalid()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->post('/admin/post/save', [

        ]);

        $response->assertSessionHasErrors();
    }

    public function test_save_unauthenticated()
    {
        $response = $this->post('/admin/post/save', Post::factory()->make()->toArray());

        $response->assertStatus(302);
    }
}
