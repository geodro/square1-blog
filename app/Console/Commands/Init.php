<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class Init extends Command
{
    protected $signature = 'square1:init';

    protected $description = 'Create Admin User';

    public function handle(): void
    {
        $admin = User::query()->where('name', 'Admin')->first();

        if (!empty($admin)) {
            $this->warn('User admin already exists');
            return;
        }

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = '';
        $admin->password = Hash::make(Str::random('16'));
        $admin->save();

        $this->info('Admin user was created successfully');
    }
}
