<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use Illuminate\Http\Request;
use Illuminate\View\View;

class TopicController extends Controller
{
    public function render(Request $request, string $topic): View
    {
        return view('scenes.topic', [
            'topic' => $topic,
            'catchphrase' => Functions::topics_catchphrase(),
            'posts' => Functions::generate_test_posts(10)
        ]);
    }

    public function render_more(Request $request, string $topic): View
    {
        return view('components.post-feed', [
            'posts' => Functions::generate_test_posts(10),
            'infinitescrollurl' => "/api/posts/topic/$topic"
        ]);
    }
}
