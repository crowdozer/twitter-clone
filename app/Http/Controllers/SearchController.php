<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\View\Components\PostFeed;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends Controller
{
    /**
     * Renders the search page
     */
    public function render(Request $request): View
    {
        $query = $request->query('q');

        return view('scenes.search', [
            'search' => $query,
            'posts' => Functions::generate_test_posts(10)
        ]);
    }

    /**
     * Infinitescroll
     */
    public function render_more(Request $request): View
    {
        $query = $request->query('q');

        return (new PostFeed(
            "/api/posts/search?q=$query",
            Functions::generate_test_posts(10)
        ))->render();
    }
}
