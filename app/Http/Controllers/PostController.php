<?php

namespace App\Http\Controllers;

use App\Helpers\Functions;
use App\View\Components\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class PostController extends Controller
{
    /**
     * Renders the post page
     */
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

    /**
     * Post page infinite scroll
     */
    public function render_more(Request $request, string $id): View
    {
        return view('components.post-feed', [
            'posts' => Functions::generate_test_posts(10, false),
            'infinitescrollurl' => "/api/posts/$id"
        ]);
    }

    /**
     * Submits a post reply, returns the result
     */
    public function reply(Request $request)
    {
        $post = Functions::generate_test_posts(1, false)[0];
        $post = array_merge($post, [

            // 'id'                => fake()->uuid(),
            'author_id'         => Auth::user()->username,
            'author'            => Auth::user()->name,
            'author_verified'   => true,
            'content'           => $request->input('comment'),
            'likes'             => 1,
            'user_liked'        => true,
            'shares'            => 0,
            'user_shared'       => 0,
            'comments'          => 0,
            'user_commented'    => 0,
            'views'             => 1,
            'posted_on'         => new \DateTime('now'),
            'hashtags'          => fake()->words(),
            'is_bot'            => false,
            'has_image'         => false,
            '_img_id'           => ''
        ]);

        return (new Post($post))->render().'<hr>';
    }
}
