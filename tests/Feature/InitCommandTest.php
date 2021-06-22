<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class InitCommandTest extends TestCase
{
    use RefreshDatabase;

    public function test_init_command()
    {
        $this->artisan('square1:init')
            ->expectsOutput('Admin user was created successfully')
            ->assertExitCode(0);
    }

    public function test_init_command_user_existing()
    {
        $user = User::factory([
            'name' => 'Admin'
        ])->create();

        $this->artisan('square1:init')
            ->expectsOutput('User admin already exists')
            ->assertExitCode(0);
    }
}
