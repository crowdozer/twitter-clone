<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PostController extends Controller
{
    public function render(Request $request, string $id): View
    {
        $post = Functions::generate_test_posts(1)[0];
        $post['id'] = $id;

        $replies = Functions::generate_test_posts(10, false);

        return view('scenes.post', [
            'post' => $post,
            'replies' => $replies
        ]);
    }

    public function render_more(Request $request, string $id): View
    {
        return view('components.post-feed', [
            'posts' => Functions::generate_test_posts(10, false),
            'infinitescrollurl' => "/api/posts/$id"
        ]);
    }
}
