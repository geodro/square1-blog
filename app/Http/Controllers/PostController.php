<?php

namespace App\Http\Controllers;

use App\Http\Requests\PostRequest;
use App\Models\Post;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class PostController extends Controller
{
    public function index(Request $request): View
    {
        $defaultSort = 'desc';

        $sort = $request->get('sort', $defaultSort);

        if (!in_array($sort, ['asc', 'desc'])) {
            $sort = $defaultSort;
        }

        return view('dashboard', [
            'posts' => $request->user()->posts()->orderBy('publication_date', $sort)->paginate(),
            'sort' => $sort
        ]);
    }

    public function create(): View
    {
        return view('posts.create');
    }

    public function save(PostRequest $request): RedirectResponse
    {
        $request->validated();

        $post = new Post();
        $post->user_id = $request->user()->id;
        $post->title = ucfirst($request->get('title'));
        $post->description = $request->get('description');
        $post->description = $request->get('description');
        $post->publication_date = $request->get('publication_date');

        $post->save();

        Cache::flush();

        return redirect()->route('dashboard');
    }
}
