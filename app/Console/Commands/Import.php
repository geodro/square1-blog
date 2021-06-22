<?php

namespace App\Console\Commands;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use App\Models\User;
use App\Services\BlogClient;
use Illuminate\Console\Command;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Validator;

class Import extends Command
{
    protected $signature = 'square1:import';

    protected $description = 'Import blog posts';

    public function handle(): void
    {
        $response = (new BlogClient())
            ->getPosts();

        if ($response->failed()) {
            $this->error('Error retrieving posts');
            return;
        }

        $data = json_decode($response->body())->data;

        $this->import($data, $this->getUser());

        Cache::flush();

        $this->info('Imported ' . count($data) . ' posts');
    }

    protected function getUser(): User
    {
        $user = User::query()->where('name', 'Admin')->first();

        if (empty($user)) {
            $this->alert('Admin user missing. Running square1:init command');
            $this->call('square1:init');

            return $this->getUser();
        }

        return $user;
    }

    // If we have more than reasonable amount of articles to import we should queue the import
    protected function import(array $items, User $user): void
    {
        foreach ($items as $item) {
            $validator = Validator::make((array)$item, PostRequest::getRules());

            if ($validator->fails()) {
                $this->warn('Validation failed for post: ' . $validator->getMessageBag()->first());
                continue;
            }

            $post = new Post();
            $post->user_id = $user->id;
            $post->title = $item->title;
            $post->description = $item->description;
            $post->publication_date = Carbon::createFromTimeString($item->publication_date);

            $post->save();
        }
    }
}
