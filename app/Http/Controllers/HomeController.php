<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    public function index(Request $request): View
    {
        return view('welcome', [
            'posts' => Post::query()
                ->whereDate('publication_date', '<=', today())
                ->orderBy('publication_date', 'desc')
                ->paginate()
        ]);
    }

    public function post(Post $post): View
    {
        return view('posts.view', [
            'post' => $post
        ]);
    }
}
